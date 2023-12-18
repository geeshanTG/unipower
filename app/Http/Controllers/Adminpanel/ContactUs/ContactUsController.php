<?php

namespace App\Http\Controllers\Adminpanel\ContactUs;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class ContactUsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:contact-info-edit', ['only' => ['index, update']]);

    }
    public function index()
    {
        $data = ContactInfo::first();
        return view('adminpanel.contactus.contact_info', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'address' => 'required',
            'phone1' => 'required',
            'phone2' => 'required',
            'fax' => 'required',
            'email' => 'required',
            'facebook_url' => 'required',
            'linkedin_url' => 'required',
            'twitter_url' => 'required',
        ]);

        if ($request->hasFile('logo')) {

            $request->validate([
                'logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $Image = $request->file('logo')->getClientOriginalName();

            $pathImage = $request->file('logo')->store('public/contactusimages');

        }

        $data = ContactInfo::find($request->id);
        $data->heading_title = $request->heading;
        $data->description = $request->description;
        $data->address = $request->address;
        $data->phone_number_1 = $request->phone1;
        $data->phone_number_2 = $request->phone2;
        $data->fax = $request->fax;
        $data->email = $request->email;
        $data->facebook_url = $request->facebook_url;
        $data->linkedin_url = $request->linkedin_url;
        $data->twitter_url = $request->twitter_url;
        if(!empty($pathImage)) {
            $data->logo = $pathImage;
        }
        $data->save();

        \LogActivity::addToLog('contact info content updated.');

        return redirect()
            ->route('contact-info-edit')
            ->with('success', 'contact info content updated successfully.');
    }
}
