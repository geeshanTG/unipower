<?php

namespace App\Http\Controllers\Adminpanel\Products;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use DataTables;

class MainCategoryController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:main-categories-list|main-categories-create|main-categories-edit|main-categories-delete', ['only' => ['list']]);
        $this->middleware('permission:main-categories-create', ['only' => ['store', 'index']]);
        $this->middleware('permission:main-categories-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:main-categories-delete', ['only' => ['block']]);
    }

    public function index()
    {
        return view('adminpanel.products.main_categories.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'order' => 'required',
            'status' => 'required',
        ]);

        if (!$request->file('image') == "") {

            $image = $request->file('image')->getClientOriginalName();

            $pathimage = $request->file('image')->store('public/productimages');
        } else {
            $pathimage = "";
        }

        $maincategory = new MainCategory();
        $maincategory->heading = $request->heading;
        $maincategory->image = $pathimage;
        $maincategory->order = $request->order;
        $maincategory->status = $request->status;
        $maincategory->save();
        $id = $maincategory->id;

        \LogActivity::addToLog('New main category '.$request->heading.' added('.$id.').');

        return redirect()->route('main-categories-list')
            ->with('success', 'Main Category record created successfully.');
    }

    public function list(Request $request) {

        if ($request->ajax()) {
            $data = MainCategory::where('is_delete', 0)->orderBy('order', 'ASC')->get();
            // die(var_dump($data));
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-main-categories/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('activation', function($row){
                    if ( $row->status == "Y" )
                        $status ='fa fa-check';
                    else
                        $status ='fa fa-remove';

                    $btn = '<a href="changestatus-main-categories/'.$row->id.'/'.$row->cEnable.'"><i class="'.$status.'"></i></a>';

                    return $btn;
                })
                ->addColumn('blockmaincategories', 'adminpanel.products.main_categories.actionsBlock')
                ->rawColumns(['edit', 'activation', 'blockmaincategories'])
                ->make(true);
        }

        return view('adminpanel.products.main_categories.list');
    }

    public function edit($id)
    {
        $mainCategoryId = decrypt($id);
        $data = MainCategory::find($mainCategoryId);

        return view('adminpanel.products.main_categories.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'order' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $Image = $request->file('image')->getClientOriginalName();

            $pathimage = $request->file('image')->store('public/productimages');

        }

        $data =  MainCategory::find($request->id);
        $data->heading = $request->heading;
        if(!empty($pathimage)) {
            $data->image = $pathimage;
        }
        $data->order = $request->order;
        $data->status = $request->status;
        $data->save();

        \LogActivity::addToLog('Main category record updated.');

        return redirect()->route('main-categories-list')
            ->with('success', 'Main category record updated successfully.');
    }

    public function activation(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  MainCategory::find($request->id);

        if ( $data->status == "Y" ) {

            $data->status = 'N';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Main category record '.$data->heading.' deactivated('.$id.').');

            return redirect()->route('main-categories-list')
            ->with('success', 'Main category record deactivate successfully.');

        } else {

            $data->status = "Y";
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Main category record '.$data->heading.' activated('.$id.').');

            return redirect()->route('main-categories-list')
            ->with('success', 'Main catgeory record activate successfully.');
        }
    }

    public function block(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  MainCategory::find($request->id);
        $data->is_delete = 1;
        $data->save();
        $id = $data->id;

        \LogActivity::addToLog('Main category record '.$data->heading.' deleted('.$id.').');

        return redirect()->route('main-categories-list')
            ->with('success', 'Main category record deleted successfully.');
    }

}
