<?php

namespace App\Http\Controllers\Adminpanel\Home;

use App\Http\Controllers\Controller;
use App\Models\MiddleBannerContent;
use Illuminate\Http\Request;
use DataTables;

class MiddleBannerController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:middle-banner-edit', ['only' => ['index, update']]);
    }

    public function index()
    {
        $data = MiddleBannerContent::first();

        return view('adminpanel.home.middle_banner_content', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'count_1' => 'required',
            'heading_1' => 'required',
            'count_2' => 'required',
            'heading_2' => 'required',
            'count_3' => 'required',
            'heading_3' => 'required',
            'count_4' => 'required',
            'heading_4' => 'required',
        ]);

        $data =  MiddleBannerContent::find($request->id);
        $data->count_1 = $request->count_1;
        $data->heading_1 = $request->heading_1;
        $data->count_2 = $request->count_2;
        $data->heading_2 = $request->heading_2;
        $data->count_3 = $request->count_3;
        $data->heading_3 = $request->heading_3;
        $data->count_4 = $request->count_4;
        $data->heading_4 = $request->heading_4;
        $data->save();

        \LogActivity::addToLog('Middle banner content updated.');

        return redirect()->route('middle-banner-edit')
            ->with('success', 'Middle banner content updated successfully.');
    }

}
