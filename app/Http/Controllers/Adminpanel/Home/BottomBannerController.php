<?php

namespace App\Http\Controllers\Adminpanel\Home;

use App\Http\Controllers\Controller;
use App\Models\BottomBannerContent;
use App\Models\MiddleBannerContent;
use Illuminate\Http\Request;
use DataTables;

class BottomBannerController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:bottom-banner-edit', ['only' => ['index, update']]);
    }

    public function index()
    {
        $data = BottomBannerContent::first();

        return view('adminpanel.home.bottom_banner_content', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'description' => 'required | max:250'
        ]);

        $data =  BottomBannerContent::find($request->id);
        $data->heading = $request->heading;
        $data->description = $request->description;
        $data->save();

        \LogActivity::addToLog('Bototm banner content updated.');

        return redirect()->route('bottom-banner-edit')
            ->with('success', 'Bottom banner content updated successfully.');
    }

}
