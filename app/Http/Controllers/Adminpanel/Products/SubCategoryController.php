<?php

namespace App\Http\Controllers\Adminpanel\Products;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use DataTables;

class SubCategoryController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:sub-categories-list|sub-categories-create|sub-categories-edit|sub-categories-delete', ['only' => ['list']]);
        $this->middleware('permission:sub-categories-create', ['only' => ['store', 'index']]);
        $this->middleware('permission:sub-categories-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:sub-categories-delete', ['only' => ['block']]);
    }

    public function index()
    {
        $mainCategories = MainCategory::where('status', 'Y')->where('is_delete', 0)->orderBy('order', 'ASC')->get();

        return view('adminpanel.products.sub_categories.index', compact('mainCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'main_category_id' => 'required',
            'heading' => 'required',
            'order' => 'required',
            'status' => 'required',
        ]);

        $subcategory = new SubCategory();
        $subcategory->main_category_id = $request->main_category_id;
        $subcategory->heading = $request->heading;
        $subcategory->order = $request->order;
        $subcategory->status = $request->status;
        $subcategory->save();
        $id = $subcategory->id;

        \LogActivity::addToLog('New sub category '.$request->heading.' added('.$id.').');

        return redirect()->route('sub-categories-list')
            ->with('success', 'Sub Category record created successfully.');
    }

    public function list(Request $request) {

        if ($request->ajax()) {
            $data = SubCategory::join('main_categories', 'main_categories.id', '=', 'sub_categories.main_category_id')
                                ->select(array('sub_categories.*','main_categories.heading as main_cat_heading'))
                                ->where('sub_categories.is_delete', 0)
                                ->orderBy('sub_categories.order', 'ASC')
                                ->get();
            // die(var_dump($data));
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-sub-categories/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('activation', function($row){
                    if ( $row->status == "Y" )
                        $status ='fa fa-check';
                    else
                        $status ='fa fa-remove';

                    $btn = '<a href="changestatus-sub-categories/'.$row->id.'/'.$row->cEnable.'"><i class="'.$status.'"></i></a>';

                    return $btn;
                })
                ->addColumn('blocksubcategories', 'adminpanel.products.sub_categories.actionsBlock')
                ->rawColumns(['edit', 'activation', 'blocksubcategories'])
                ->make(true);
        }

        return view('adminpanel.products.sub_categories.list');
    }

    public function edit($id)
    {
        $mainCategories = MainCategory::where('status', 'Y')->where('is_delete', 0)->orderBy('order', 'ASC')->get();
        $subCategoryId = decrypt($id);
        $data = SubCategory::find($subCategoryId);

        return view('adminpanel.products.sub_categories.edit', ['mainCategories' => $mainCategories,'data' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'main_category_id' => 'required',
            'heading' => 'required',
            'order' => 'required',
            'status' => 'required',
        ]);

        $data =  SubCategory::find($request->id);
        $data->main_category_id = $request->main_category_id;
        $data->heading = $request->heading;
        $data->order = $request->order;
        $data->status = $request->status;
        $data->save();

        \LogActivity::addToLog('Sub category record updated.');

        return redirect()->route('sub-categories-list')
            ->with('success', 'Sub category record updated successfully.');
    }

    public function activation(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  SubCategory::find($request->id);

        if ( $data->status == "Y" ) {

            $data->status = 'N';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Sub category record '.$data->heading.' deactivated('.$id.').');

            return redirect()->route('sub-categories-list')
            ->with('success', 'Sub category record deactivate successfully.');

        } else {

            $data->status = "Y";
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Sub category record '.$data->heading.' activated('.$id.').');

            return redirect()->route('sub-categories-list')
            ->with('success', 'Sub catgeory record activate successfully.');
        }
    }

    public function block(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  SubCategory::find($request->id);
        $data->is_delete = 1;
        $data->save();
        $id = $data->id;

        \LogActivity::addToLog('Sub category record '.$data->heading.' deleted('.$id.').');

        return redirect()->route('sub-categories-list')
            ->with('success', 'Sub category record deleted successfully.');
    }

}
