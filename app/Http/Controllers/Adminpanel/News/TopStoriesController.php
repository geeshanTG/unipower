<?php

namespace App\Http\Controllers\Adminpanel\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\TopStory;
use Illuminate\Http\Request;
use DataTables;

class TopStoriesController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:top-stories-edit', ['only' => ['index, update']]);
    }

    public function index()
    {
        $news = News::where('is_delete', 0)->where('status', 'Y')->orderBy('news_date', 'DESC')->get();
        $data = TopStory::first();

        return view('adminpanel.news.top_stories', compact('data', 'news'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'top_story_news_1' => 'required',
            'top_story_news_2' => 'required',
        ]);

        $data =  TopStory::find($request->id);
        $data->top_story_news_1 = $request->top_story_news_1;
        $data->top_story_news_2 = $request->top_story_news_2;

        $data->save();

        \LogActivity::addToLog('Top stories news updated.');

        return redirect()->route('top-stories-edit')
            ->with('success', 'Top stories news updated successfully.');
    }

}
