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
                    $edit_url = route('subcategory-list', encrypt($row->id));
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })

                ->addColumn('activation', function ($row) {
                    if ($row->status == 'Y') {
                        $status = 'fa fa-check';
                    } else {
                        $status = 'fa fa-remove';
                    }

                    $status_url = route('subcategory-list', encrypt($row->id));
                    $btn = '<a href="' . $status_url . '"><i class="' . $status . '"></i></a>';

                    return $btn;
                })

                ->rawColumns(['edit', 'activation', 'category', 'status'])
                ->make(true);
        }

        return view('adminpanel.products.subcategory.list');
    }
}
