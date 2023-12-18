<?php

namespace App\Http\Controllers\Adminpanel\Home;

use App\Http\Controllers\Controller;
use App\Models\IndustryInsight;
use App\Models\News;
use Illuminate\Http\Request;
use DataTables;

class IndustryInsightsController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:industry-insights-edit', ['only' => ['index, update']]);
    }

    public function index()
    {
        $news = News::where('is_delete', 0)->where('status', 'Y')->orderBy('heading', 'ASC')->get();
        $data = IndustryInsight::first();

        return view('adminpanel.home.industry_insights', compact('data', 'news'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'news_id_1' => 'required',
            'news_id_2' => 'required',
            'news_id_3' => 'required',
            'news_id_4' => 'required',
        ]);

        $data =  IndustryInsight::find($request->id);
        $data->news_id_1 = $request->news_id_1;
        $data->news_id_2 = $request->news_id_2;
        $data->news_id_3 = $request->news_id_3;
        $data->news_id_4 = $request->news_id_4;
        $data->save();

        \LogActivity::addToLog('Industry insights and news updated.');

        return redirect()->route('industry-insights-edit')
            ->with('success', 'Industry insights and news updated successfully.');
    }

}
