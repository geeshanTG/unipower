<?php

namespace App\Http\Controllers\Userpanel;
use App\Models\Enquiry;

use App\Models\Service;
use App\Rules\ReCaptcha;
use App\Models\ContactInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $pageTitle = 'Contact Us';
        $contactInfo = ContactInfo::first();
        $serviceList = Service::select('id', 'heading')
            ->where('status', 'Y')
            ->where('is_delete', 0)
            ->orderBy('id', 'ASC')
            ->get();
        return view('userpanel.contactus', compact('contactInfo', 'pageTitle','serviceList'));
    }

    public function store(Request $request)
    {
        $contactInfo = ContactInfo::first();
        $serviceList = Service::select('id', 'heading')
        ->where('status', 'Y')
        ->where('is_delete', 0)
        ->orderBy('id', 'ASC')
        ->get();

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'subject' => 'required',
                'message' => 'required',
                'g-recaptcha-response' => ['required', new ReCaptcha()],
            ],
            [
                'name.required' => 'Name field is required.',
                'email.required' => 'Email field is required.',
                'phone.required' => 'Phone field is required.',
                'subject.required' => 'Subject field is required.',
                'message.required' => 'Message is required.',
            ],
        );

        $data = new Enquiry();
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->message = $request->message;
        $data->status = 'Y';
        $data->save();

        dd($data);

        \Mail::send('userpanel.mail.enquirymail', ['enquirydetails' => $data, 'contactsdetails' => $contactInfo], function ($message) use ($contactInfo) {
            $message->from('info@unipower.com');
            $message->to($contactInfo->email)->subject('Unipower - New Enquiry');
        });

        return redirect()
            ->back()
            ->with('success', 'Your enquiry has been submitted successfully.');

        // return redirect()->route('contact-us')
        // ->with('success', 'Your enquiry has been submitted successfully.');
    }
}
