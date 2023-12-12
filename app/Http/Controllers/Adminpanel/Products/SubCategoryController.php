<?php

namespace App\Http\Controllers\Adminpanel\Products;
use DataTables;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:subcategory-list', ['only' => ['datalist']]);
        $this->middleware('permission:subcategory-create', ['only' => ['index', 'store']]);
        $this->middleware('permission:subcategory-edit', ['only' => ['edit','activation']]);
    }

    public function index()
    {
        $savestatus = 'A';
        $title = 'New';

        $categories = ProductCategory::select('*')
            ->where('is_delete', 0)
            ->orderBy('name', 'ASC')
            ->get();

        return view('adminpanel.products.subcategory.index')->with(['savestatus' => $savestatus, 'title' => $title, 'categories' => $categories]);
    }

    public function datalist(Request $request)
    {
        if ($request->ajax()) {
            $data = ProductSubCategory::join('product_category', 'product_subcategory.category_id', '=', 'product_category.id')
                ->select('product_subcategory.*', 'product_category.name as p_name')
                ->where('product_subcategory.is_delete', 0)
                ->orderBy('product_subcategory.name', 'ASC')
                ->get();

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
                ->addColumn('category', function ($row) {
                    return $row->p_name;
                })
                ->addColumn('edit', function ($row) {
                    $edit_url = route('edit-subcategory', encrypt($row->id));
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })

                ->addColumn('activation', function ($row) {
                    if ($row->status == 'Y') {
                        $status = 'fa fa-check';
                    } else {
                        $status = 'fa fa-remove';
                    }

                    $status_url = route('status-subcategory', encrypt($row->id));
                    $btn = '<a href="' . $status_url . '"><i class="' . $status . '"></i></a>';

                    return $btn;
                })

                ->rawColumns(['edit', 'activation', 'category', 'status'])
                ->make(true);
        }

        return view('adminpanel.products.subcategory.list');
    }

    public function store(Request $request)
    {
        if ($request->savestatus == 'A') {
            $request->validate([
                'name' => 'required|max:50',
               
                'category_id' => 'required',       
                'status' => 'required'
                
            ]);
        } else {
            $request->validate([
                'name' => 'required|max:50',
               
                'category_id' => 'required',
                'status' => 'required'
                
            ]);
        }
        
        $data_arry = array();
        $data_arry['name'] = $request->name;
       
        $data_arry['category_id'] = $request->category_id;
        $data_arry['status'] = $request->status; 
        $data_arry['urlname'] = preg_replace('/-+/', '-', preg_replace('/[^a-zA-Z0-9\s-]/', '', preg_replace('/\s+/', '-', strtolower($request->name))));
     
              
        if($request->savestatus == 'A'){
                       
            $id= ProductSubcategory::create($data_arry);
             \LogActivity::addToLog('New subcategory'.$request->name.' added('.$id->id.').');
            return redirect('new-subcategory')->with('success', 'New subcategory created successfully');
        }else{
            
            $recid = $request->id;
            
            ProductSubcategory::where('id', decrypt($recid))->update($data_arry);
            \LogActivity::addToLog('subcategory ' . $request->name . ' updated(' . decrypt($recid) . ').');
            return redirect('/edit-subcategory/'.$recid.'')->with('success', 'subcategory updated successfully');
        }

    }

  
 public function activation(Request $request)
    {
        $idD = decrypt($request->id);

        $data =  ProductSubcategory::find($idD);

        if ( $data->status == "Y" ) {

            $data->status = 'N';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('subcategory record '.$data->name.' deactivated('.$id.')');

            return redirect()->route('subcategory-list')
            ->with('success', 'Record deactivate successfully.');

        } else {

            $data->status = "Y";
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('subcategory record '.$data->name.' activated('.$id.')');

            return redirect()->route('subcategory-list')
            ->with('success', 'Record activate successfully.');
        }

    }

    public function edit($id)
    {
        $ID = decrypt($id);
     
        $info = ProductSubcategory::where('id', '=', $ID)->get();
      
        $title = 'Edit';
      
        $savestatus = 'E';
        $categories = ProductCategory::select('*')->where('is_delete',  0)->orderBy('name','ASC')->get();

        return view('adminpanel.products.subcategory.index')->with(['info' => $info, 'savestatus' => $savestatus, 'title' => $title, 'categories' => $categories]);
        
        
        //return view('masterdata.complain_category.edit', ['data' => $data]);
        //return view('masterdata.complain_category.edit');
    }

    
}
