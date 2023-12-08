<?php

namespace App\Http\Controllers\Adminpanel\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\Overview;
use App\Models\WhoWeAre;
use Illuminate\Http\Request;
use DataTables;

class AboutUsController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:who-we-are', ['only' => ['index, update']]);
    }

    public function index()
    {
        $data = WhoWeAre::first();

        return view('adminpanel.aboutus.who_we_are', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'description_1' => 'required',
            'description_2' => 'required',
            'image_1' => 'required',
            'image_2' => 'required',
            'image_3' => 'required'
        ]);

        if ($request->hasFile('image_1')) {

            $request->validate([
                'image_1' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $image1 = $request->file('image_1')->getClientOriginalName();

            $pathimage_1 = $request->file('image_1')->store('public/aboutusimages');

        }

        if ($request->hasFile('image_2')) {

            $request->validate([
                'image_2' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $image2 = $request->file('image_2')->getClientOriginalName();

            $pathimage_2 = $request->file('image_2')->store('public/aboutusimages');

        }

        if ($request->hasFile('image_3')) {

            $request->validate([
                'image_3' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $image3 = $request->file('image_3')->getClientOriginalName();

            $pathimage_3 = $request->file('image_3')->store('public/aboutusimages');

        }

        $data =  WhoWeAre::find($request->id);
        $data->heading = $request->heading;
        $data->description_1 = $request->description_1;
        $data->description_2 = $request->description_2;
        $data->image_1 = $pathimage_1;
        $data->image_2 = $pathimage_2;
        $data->image_3 = $pathimage_3;
        $data->save();

        \LogActivity::addToLog('who we are content updated.');

        return redirect()->route('who-we-are-edit')
            ->with('success', 'Who we are content updated successfully.');
    }

}
