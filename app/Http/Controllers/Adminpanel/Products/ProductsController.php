<?php

namespace App\Http\Controllers\Adminpanel\Products;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use DataTables;

class ProductsController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:products-list|products-create|products-edit|products-delete', ['only' => ['list']]);
        $this->middleware('permission:products-create', ['only' => ['store', 'index']]);
        $this->middleware('permission:products-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:products-delete', ['only' => ['block']]);
    }

    public function index()
    {
        $mainCategories = MainCategory::where('status', 'Y')->where('is_delete', 0)->orderBy('order', 'ASC')->get();
        $subCategories = SubCategory::where('status', 'Y')->where('is_delete', 0)->orderBy('order', 'ASC')->get();

        return view('adminpanel.products.products.index', compact('mainCategories','subCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'main_category_id' => 'required',
            'sub_category_id' => 'required',
            'heading' => 'required',
            'sub_heading' => 'required',
            'description' => 'required',
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

        if (!$request->file('brochure') == "") {
 				$request->validate([
          
           
            'brochure' => 'mimes:pdf,docx',
          
       			 ]);
            $brochure = $request->file('brochure')->getClientOriginalName();

            $pathbrochure = $request->file('brochure')->store('public/productimages');
        } else {
            $pathbrochure = "";
        }
    	$slug = preg_replace('/-+/', '-', preg_replace('/[^a-zA-Z0-9\s-]/', '', preg_replace('/\s+/', '-', strtolower($request->heading))));
      
        $product = new Product();
        $product->main_category_id = $request->main_category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->heading = $request->heading;
        $product->sub_heading = $request->sub_heading;
        $product->description = $request->description;
        $product->image = $pathimage;
       	$product->slug = $slug;
     
        $product->brochure = $pathbrochure;
        $product->order = $request->order;
        $product->status = $request->status;
        $product->save();
        $id = $product->id;

        \LogActivity::addToLog('New prodcut '.$request->heading.' added('.$id.').');

        return redirect()->route('products-list')
            ->with('success', 'Product record created successfully.');
    }

    public function list(Request $request) {

        if ($request->ajax()) {
            $data = Product::join('main_categories', 'main_categories.id', '=', 'products.main_category_id')
                                ->join('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
                                ->select(array('products.*','main_categories.heading as main_cat_heading','sub_categories.heading as sub_cat_heading'))
                                ->where('products.is_delete', 0)
                                ->orderBy('products.order', 'ASC')
                                ->get();
            // die(var_dump($data));
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-products/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('activation', function($row){
                    if ( $row->status == "Y" )
                        $status ='fa fa-check';
                    else
                        $status ='fa fa-remove';

                    $btn = '<a href="changestatus-products/'.$row->id.'/'.$row->cEnable.'"><i class="'.$status.'"></i></a>';

                    return $btn;
                })
                ->addColumn('blockproducts', 'adminpanel.products.products.actionsBlock')
                ->rawColumns(['edit', 'activation', 'blockproducts'])
                ->make(true);
        }

        return view('adminpanel.products.products.list');
    }

    public function edit($id)
    {
        $mainCategories = MainCategory::where('status', 'Y')->where('is_delete', 0)->orderBy('order', 'ASC')->get();
        $subCategories = SubCategory::where('status', 'Y')->where('is_delete', 0)->orderBy('order', 'ASC')->get();
        $productId = decrypt($id);
        $data = Product::find($productId);

        return view('adminpanel.products.products.edit', ['mainCategories' => $mainCategories, 'subCategories' => $subCategories, 'data' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'main_category_id' => 'required',
            'sub_category_id' => 'required',
            'heading' => 'required',
            'sub_heading' => 'required',
            'description' => 'required',
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

        if ($request->hasFile('brochure')) {

            $request->validate([
                'brochure' => 'mimes:pdf,docx',
            ]);

            $brochure = $request->file('brochure')->getClientOriginalName();

            $pathbrochure = $request->file('brochure')->store('public/productimages');

        }
      	$slug = preg_replace('/-+/', '-', preg_replace('/[^a-zA-Z0-9\s-]/', '', preg_replace('/\s+/', '-', strtolower($request->heading))));

        $data =  Product::find($request->id);
        $data->main_category_id = $request->main_category_id;
        $data->sub_category_id = $request->sub_category_id;
        $data->heading = $request->heading;
       	$data->slug = $slug;
        $data->sub_heading = $request->sub_heading;
        $data->description = $request->description;
        if(!empty($pathimage)) {
            $data->image = $pathimage;
        }
        if(!empty($pathbrochure)) {
            $data->brochure = $pathbrochure;
        }
        $data->order = $request->order;
        $data->status = $request->status;
        $data->save();

        \LogActivity::addToLog('Product record updated.');

        return redirect()->route('products-list')
            ->with('success', 'Product record updated successfully.');
    }

    public function activation(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  Product::find($request->id);

        if ( $data->status == "Y" ) {

            $data->status = 'N';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Product record '.$data->heading.' deactivated('.$id.').');

            return redirect()->route('products-list')
            ->with('success', 'Product record deactivate successfully.');

        } else {

            $data->status = "Y";
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Product record '.$data->heading.' activated('.$id.').');

            return redirect()->route('products-list')
            ->with('success', 'Product record activate successfully.');
        }
    }

    public function block(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  Product::find($request->id);
        $data->is_delete = 1;
        $data->save();
        $id = $data->id;

        \LogActivity::addToLog('Product record '.$data->heading.' deleted('.$id.').');

        return redirect()->route('products-list')
            ->with('success', 'Product record deleted successfully.');
    }

    public function getSubCategories(Request $request)
    {
        // dd($request->main_category_id);
        $subCategories = SubCategory::where("main_category_id", $request->main_category_id)->get();
                            // dd($subCategories);
        return response()->json($subCategories);
    }

}
