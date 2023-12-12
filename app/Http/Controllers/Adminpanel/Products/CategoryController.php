<?php

namespace App\Http\Controllers\Adminpanel\Products;
use Illuminate\Http\Request;

use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use DataTables;

class CategoryController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:category-list', ['only' => ['index, update']]);
        $this->middleware('permission:category-list', ['only' => ['datalist,index,store']]);
    }
    public function index()
    {
        $savestatus = 'A';
        $title = 'New';
        return view('adminpanel.products.category.index')
            ->with('savestatus', $savestatus)
            ->with('title', $title);
    }
    public function store(Request $request)
    {
        if ($request->savestatus == 'A') {
            $request->validate([
                'name' => 'required|max:500',
                'urlname' => 'max:1000',
                'status' => 'required',
            ]);
        } else {
            $request->validate([
                'name' => 'required|max:500',
                'urlname' => 'max:1000',
                'status' => 'required',
            ]);
        }
      
        if ($request->file('image')) {
            $request->validate([
                'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $image = $request->file('image')->getClientOriginalName();
            $pathimage = $request->file('image')->store('public/categoryimages');
        }
      
        $data_arry = [];
        $data_arry['name'] = $request->name;
        $data_arry['urlname'] = preg_replace('/-+/', '-', preg_replace('/[^a-zA-Z0-9\s-]/', '', preg_replace('/\s+/', '-', strtolower($request->name))));
        $data_arry['status'] = $request->status;
        $data_arry['order'] = $request->order;
        $data_arry['image'] = $pathimage ?? '';

        if ($request->savestatus == 'A') {
            $id = ProductCategory::create($data_arry);
            \LogActivity::addToLog('New Category' . $request->name . ' added(' . $id->id . ').');
            return redirect('category-list')->with('success', 'New Category created successfully');
        } else {
            $recid = $request->id;

            ProductCategory::where('id', decrypt($recid))->update($data_arry);
            \LogActivity::addToLog('Category ' . $request->name . ' updated(' . decrypt($recid) . ').');
            return redirect('/edit-category/' . $recid . '')->with('success', 'Category updated successfully');
        }
    }

    public function datalist(Request $request)
    {
        if ($request->ajax()) {
            $data = ProductCategory::select('*')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->status == 'Y') {
                        $btn = 'Active';
                    } else {
                        $btn = 'Inactive';
                    }
                    return $btn;
                })
                ->addColumn('edit', function ($row) {
                    $edit_url = route('edit-category', encrypt($row->id));
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })

                ->addColumn('activation', function ($row) {
                    if ($row->status == 'Y') {
                        $status = 'fa fa-check';
                    } else {
                        $status = 'fa fa-remove';
                    }

                    $status_url = route('status-category', encrypt($row->id));
                    $btn = '<a href="' . $status_url . '"><i class="' . $status . '"></i></a>';

                    return $btn;
                })

                //->addColumn('edit', 'dealers.actionsEdit')
                //->addColumn('activation', 'dealers.actionsStatus')
                ->rawColumns(['edit', 'activation'])
                ->make(true);
        }

        return view('adminpanel.products.category.list');
    }

    public function activation(Request $request)
    {
        $idD = decrypt($request->id);

        $data = ProductCategory::find($idD);

        if ($data->status == 'Y') {
            $data->status = 'N';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('category record '.$data->name.' deactivated('.$id.')');

            return redirect()
                ->route('category-list')
                ->with('success', 'Record deactivate successfully.');
        } else {
            $data->status = 'Y';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('category record '.$data->name.' activated('.$id.')');

            return redirect()
                ->route('category-list')
                ->with('success', 'Record activate successfully.');
        }
    }

    public function edit($id)
    {
        $ID = decrypt($id);
        $info = ProductCategory::where('id', '=', $ID)->get();
        $title = 'Edit';
        $savestatus = 'E';
        return view('adminpanel.products.category.index')
            ->with('info', $info)
            ->with('savestatus', $savestatus)
            ->with('title', $title);
    }
}
