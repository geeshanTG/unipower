<?php

namespace App\Http\Controllers\Userpanel;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $pageTitle = "All Products";

        $mainCategories = MainCategory::where('status', 'Y')->where('is_delete', 0)->get();
        $subCategories = SubCategory::where('status', 'Y')->where('is_delete', 0)->orderBy('order', 'ASC')->get();
        $products = Product::where('status', 'Y')->where('is_delete', 0)->orderBy('order', 'ASC')->paginate(1);
        $contactInfo = ContactInfo::first();

        return view('userpanel.products', compact('pageTitle','mainCategories','subCategories','products','contactInfo'));
    }

    public function getSubCategoriesWeb(Request $request)
    {
        // dd($request->main_category_id);
        $subCategories = SubCategory::where("main_category_id", $request->main_category_id)->get();
                            // dd($subCategories);
        return response()->json($subCategories);
    }

    public function getFilteredProducts(Request $request)
    {

        $products = Product::where("main_category_id", $request->main_category_id)->where('sub_category_id', $request->sub_category_id)->get();
                            // dd($products);
        return response()->json($products);
    }

}
