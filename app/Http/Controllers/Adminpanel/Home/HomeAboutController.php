<?php

namespace App\Http\Controllers\Adminpanel\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use DataTables;

class HomeAboutController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:about-edit', ['only' => ['index, update']]);
    }

    public function index()
    {
        $data = About::first();

        return view('adminpanel.home.about', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'sub_heading' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('image_1')) {

            $request->validate([
                'image_1' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $image = $request->file('image_1')->getClientOriginalName();

            $pathimage_1 = $request->file('image_1')->store('public/homeimages');

        }

        if ($request->hasFile('image_2')) {

            $request->validate([
                'image_2' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $image = $request->file('image_2')->getClientOriginalName();

            $pathimage_2 = $request->file('image_2')->store('public/homeimages');

        }

        $data =  About::find($request->id);
        $data->heading = $request->heading;
        $data->sub_heading = $request->sub_heading;
        $data->description = $request->description;
        if(!empty($pathimage_1)) {
            $data->image_1 = $pathimage_1;
        }
        if(!empty($pathimage_2)) {
            $data->image_2 = $pathimage_2;
        }

        $data->save();

        \LogActivity::addToLog('Home about content updated.');

        return redirect()->route('about-edit')
            ->with('success', 'Home about content updated successfully.');
    }

}
