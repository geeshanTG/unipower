<?php

namespace App\Http\Controllers\Adminpanel\News;

use App\Http\Controllers\Controller;
use App\Models\FeaturedNews;
use App\Models\News;
use Illuminate\Http\Request;
use DataTables;

class FeaturedNewsController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:featured-news-edit', ['only' => ['index, update']]);
    }

    public function index()
    {
        $news = News::where('is_delete', 0)->where('status', 'Y')->orderBy('news_date', 'DESC')->get();
        $data = FeaturedNews::first();

        return view('adminpanel.news.featured_news', compact('data', 'news'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'featured_news_1' => 'required',
            'featured_news_2' => 'required',
            'featured_news_3' => 'required',
        ]);

        $data =  FeaturedNews::find($request->id);
        $data->featured_news_1 = $request->featured_news_1;
        $data->featured_news_2 = $request->featured_news_2;
        $data->featured_news_3 = $request->featured_news_3;
        $data->save();

        \LogActivity::addToLog('Featured news updated.');

        return redirect()->route('featured-news-edit')
            ->with('success', 'Featured news updated successfully.');
    }

}
