<?php

namespace App\Http\Controllers\Userpanel;
use App\Models\Enquiry;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $pageTitle = "Contact Us";
        $contactInfo = ContactInfo::first();
        return view('userpanel.contactus', compact('contactInfo','pageTitle'));
    }

    public function store(Request $request)
    {

        dd('hello');
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|min:10|max:10',
            'subject'=>'required',
            'message' => 'required'
         ]);

        $data = new Enquiry();
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->message = $request->message;
        $data->status = "Y";
        $data->save();

        return redirect()->route('contact-us')
        ->with('success', 'Your enquiry has been submitted successfully.');

        
    }
}
