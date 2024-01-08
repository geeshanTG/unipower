<?php

namespace App\Http\Controllers\Userpanel;
use App\Models\Faq;

use App\Models\Service;
use App\Models\ContactInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqsController extends Controller
{
    public function index()
    {
        $pageTitle = 'FAQ';
        $contactInfo = ContactInfo::first();
        $serviceList = Service::select('id', 'heading')
            ->where('status', 'Y')
            ->where('is_delete', 0)
            ->orderBy('id', 'ASC')
            ->get();
        $faqs = Faq::orderBy('order', 'ASC')->get();
        return view('userpanel.faq', compact('contactInfo', 'pageTitle', 'serviceList', 'faqs'));
    }
}
