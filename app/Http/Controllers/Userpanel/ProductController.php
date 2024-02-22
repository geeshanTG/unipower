<?php



namespace App\Http\Controllers\Userpanel;



use App\Models\Product;

use App\Models\Service;

use App\Models\ContactInfo;

use App\Models\SubCategory;

use App\Models\MainCategory;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;



class ProductController extends Controller

{

    public function index(Request $request)

    {

        $pageTitle = 'All Products';



        $mainCategories = MainCategory::where('status', 'Y')

            ->where('is_delete', 0)

            ->get();

        $subCategories = SubCategory::where('status', 'Y')

            ->where('is_delete', 0)

            ->orderBy('order', 'ASC')

            ->get();



        // dd($request->main_category_id);

        if (!empty($request->main_category_id) && !empty($request->sub_category_id)) {

            $mainCat = $request->main_category_id;

            $subCat = $request->sub_category_id;

            // dd($request->main_category_id);

            $products = Product::where('main_category_id', $request->main_category_id)

                ->where('sub_category_id', $request->sub_category_id)

                ->where('is_delete', 0)

                ->where('status', 'Y')

                ->paginate(12);

        }elseif(!empty($request->main_category_id)) {

            $mainCat = $request->main_category_id;

            $subCat = '';

            $products = Product::where('main_category_id',$request->main_category_id)

                ->where('is_delete', 0)

                ->where('status', 'Y')

                ->paginate(12);



        }elseif(!empty($request->sub_category_id)){

            $mainCat = '';

            $subCat = $request->sub_category_id;

            $products = Product::where('sub_category_id',$request->sub_category_id)

                ->where('is_delete', 0)

                ->where('status', 'Y')

                ->paginate(12);



        }



      else {

            // dd('test');

            $mainCat = '';

            $subCat = '';

            $products = Product::where('status', 'Y')

                ->where('is_delete', 0)

                ->orderBy('order', 'ASC')

                ->paginate(12);

        }



        $contactInfo = ContactInfo::first();

        $serviceList = Service::select('id', 'heading')

            ->where('status', 'Y')

            ->where('is_delete', 0)

            ->orderBy('id', 'ASC')

            ->get();



        return view('userpanel.products', compact('pageTitle', 'mainCategories', 'subCategories', 'products', 'contactInfo', 'serviceList', 'mainCat', 'subCat'));

    }



    public function getSubCategoriesWeb(Request $request)

    {

        // dd($request->main_category_id);

        $subCategories = SubCategory::where('main_category_id', $request->main_category_id)->get();

        // dd($subCategories);

        return response()->json($subCategories);

    }



    public function getFilteredProducts(Request $request)

    {

        // \DB::enableQueryLog();



        // dd(\DB::getQueryLog());

        // dd($products);



        $pageTitle = 'All Products';



        $mainCategories = MainCategory::where('status', 'Y')

            ->where('is_delete', 0)

            ->get();

        $subCategories = SubCategory::where('status', 'Y')

            ->where('is_delete', 0)

            ->orderBy('order', 'ASC')

            ->get();

        $products = Product::where('main_category_id', $request->main_category_id)

            ->where('sub_category_id', $request->sub_category_id)

            ->paginate(12);

        $contactInfo = ContactInfo::first();

        $serviceList = Service::select('id', 'heading')

            ->where('status', 'Y')

            ->where('is_delete', 0)

            ->orderBy('id', 'ASC')

            ->get();

       // dd($products);

        return view('userpanel.products', compact('pageTitle', 'mainCategories', 'subCategories', 'products', 'contactInfo', 'serviceList'));

    }



    public function productCategories(Request $request)

    {

        $pageTitle = 'All Products';



        $mainCategories = MainCategory::where('status', 'Y')

            ->where('is_delete', 0)

            ->get();

        $subCategories = SubCategory::where('status', 'Y')

            ->where('is_delete', 0)

            ->orderBy('order', 'ASC')

            ->get();



        $mainCatName = $request->segment(2);

        $catName = str_replace('-', ' ', $mainCatName);

        $mainCatId = MainCategory::where('heading', 'like', '%' . $catName . '%')->first();

        $products = Product::select('*')

            ->where('status', 'Y')

            ->where('is_delete', 0)

            ->where('main_category_id', $mainCatId->id)

            ->orderBy('order', 'ASC')

            ->paginate(12);

        $contactInfo = ContactInfo::first();

        $serviceList = Service::select('id', 'heading')

            ->where('status', 'Y')

            ->where('is_delete', 0)

            ->orderBy('id', 'ASC')

            ->get();



        $mainCat = '';

        $subCat = '';



        return view('userpanel.products', compact('pageTitle', 'mainCategories', 'subCategories', 'products', 'contactInfo', 'serviceList', 'mainCat', 'subCat'));

    }



    public function productDetail(Request $request)

    {

       // dd('test');

        $slug = $request->segment(2);

        //dd($slug);

        $products = Product::where('slug', $slug)

            ->distinct()

            ->first();

        $productId = $products->id;

        $mainCatName = MainCategory::where('id', $products->main_category_id)->first();

        $pageTitle = $mainCatName->heading;

        $productList = Product::where('status', 'Y')

            ->where('is_delete', 0)

            ->where('id', '!=', $productId)

            ->where('main_category_id', $products->main_catgeory_id)

            ->limit(10)

            ->get();

        $contactInfo = ContactInfo::first();

        $serviceList = Service::select('id', 'heading')

            ->where('status', 'Y')

            ->where('is_delete', 0)

            ->orderBy('id', 'ASC')

            ->get();



        return view('userpanel.productdetail', compact('pageTitle', 'products', 'productList', 'contactInfo', 'serviceList'));

    }

}

