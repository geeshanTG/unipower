<?php

namespace App\Http\Controllers\Userpanel;

use App\Models\News;
use App\Models\Product;
use App\Models\Service;
use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->text;

        $pageTitle = 'SEARCH RESULTS';
        $contactInfo = ContactInfo::first();
        $serviceList = Service::select('id', 'heading')
            ->where('status', 'Y')
            ->where('is_delete', 0)
            ->orderBy('id', 'ASC')
            ->get();
        if (!empty($searchTerm)) {
            session()->put('searchTerm', $request->text);
        }

        if (empty($searchTerm)) {
            $searchTerm = session()->get('searchTerm');
        }

        $newsResults = News::select('id', 'heading', 'description')
            ->addSelect(DB::raw("'News' AS name"))
            ->where('heading', 'like', '%' . $searchTerm . '%')
            ->where('status', 'Y')
            ->where('is_delete', 0);
        $productResults = Product::select('id', 'heading', 'description')
            ->addSelect(DB::raw("'Product' AS name"))
            ->where('heading', 'like', '%' . $searchTerm . '%')
            ->where('status', 'Y')
            ->where('is_delete', 0);
        $data = Service::select('id', 'heading', 'long_description as description')
            ->addSelect(DB::raw("'Service' AS name"))
            ->where('heading', 'like', '%' . $searchTerm . '%')
            ->where('status', 'Y')
            ->where('is_delete', 0)
            ->union($newsResults)
            ->union($productResults)
            ->orderBy('heading')
            ->paginate(5);

        return view('userpanel.search_result', compact('contactInfo', 'pageTitle', 'data', 'serviceList'));
    }
}
