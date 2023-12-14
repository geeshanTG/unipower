<?php

namespace App\Http\Controllers\Adminpanel\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Http\Request;
use DataTables;

class AwardsController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:awards-edit', ['only' => ['index, update']]);
    }

    public function index()
    {
        $data = Award::first();

        return view('adminpanel.aboutus.awards', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'award_name_1' => 'required',
            'award_image_1' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if (!$request->file('image') == "") {

            $image = $request->file('image')->getClientOriginalName();

            $pathimage = $request->file('image')->store('public/aboutusimages');
        } else {
            $pathimage = "";
        }

        if (!$request->file('award_image_1') == "") {

            $image = $request->file('award_image_1')->getClientOriginalName();

            $pathimage_award_image_1 = $request->file('award_image_1')->store('public/aboutusimages');
        } else {
            $pathimage_award_image_1 = "";
        }

        if ($request->hasFile('award_image_2')) {

            $request->validate([
                'award_image_2' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $award2image = $request->file('award_image_2')->getClientOriginalName();

            $pathimage_award_image_2 = $request->file('award_image_2')->store('public/aboutusimages');

        }

        $data =  Award::find($request->id);
        $data->heading = $request->heading;
        $data->description = $request->description;
        $data->award_name_1 = $request->award_name_1;
        if(!empty($pathimage_award_image_1)) {
            $data->award_image_1 = $pathimage_award_image_1;
        }
        $data->award_name_2 = $request->award_name_2;
        if(!empty($pathimage_award_image_2)) {
            $data->award_image_2 = $pathimage_award_image_2;
        }
        if(!empty($pathimage)) {
            $data->image = $pathimage;
        }

        $data->save();

        \LogActivity::addToLog('Awards content updated.');

        return redirect()->route('awards-edit')
            ->with('success', 'Awards content updated successfully.');
    }

}
