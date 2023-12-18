<?php

namespace App\Http\Controllers\Adminpanel\Home;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\OurCoreProduct;
use Illuminate\Http\Request;
use DataTables;

class OurCoreProductsController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:our-core-products-edit', ['only' => ['index, update']]);
    }

    public function index()
    {
        $mainCategories = MainCategory::where('is_delete', 0)->where('status', 'Y')->orderBy('order', 'ASC')->get();
        $data = OurCoreProduct::first();

        return view('adminpanel.home.our_core_products', compact('data', 'mainCategories'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'main_category_id_1' => 'required',
            'main_category_id_2' => 'required',
            'main_category_id_3' => 'required',
            'main_category_id_4' => 'required',
        ]);

        $data =  OurCoreProduct::find($request->id);
        $data->main_category_id_1 = $request->main_category_id_1;
        $data->main_category_id_2 = $request->main_category_id_2;
        $data->main_category_id_3 = $request->main_category_id_3;
        $data->main_category_id_4 = $request->main_category_id_4;
        $data->save();

        \LogActivity::addToLog('Our core product updated.');

        return redirect()->route('our-core-products-edit')
            ->with('success', 'Our core product updated successfully.');
    }

}
