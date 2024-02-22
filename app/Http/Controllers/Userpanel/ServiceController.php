<?php

namespace App\Http\Controllers\Userpanel;
use App\Models\Service;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use App\Models\ServicePageContent;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $pageTitle = 'OUR SERVICES';
        $contactInfo = ContactInfo::first();
        $serviceList = Service::select('id', 'heading')
        ->where('status', 'Y')
        ->where('is_delete', 0)
        ->orderBy('id', 'ASC')
        ->get();
        $pageContent = ServicePageContent::where('id', 1)->first();
        $services = Service::where('status', 'Y')
            ->where('is_delete', 0)
            ->get();

        return view('userpanel.services', compact('contactInfo', 'pageTitle', 'pageContent', 'services', 'serviceList'));
    }
    public function service(Request $request)
    {
      
        $slug = $request->segment(2);
        $pageTitle = 'OUR SERVICES';
      
        $contactInfo = ContactInfo::first();
        $serviceList = Service::select('id', 'heading')
        ->where('status', 'Y')
        ->where('is_delete', 0)
        ->orderBy('id', 'ASC')
        ->get();
        $service = Service::where('slug', $slug) ->distinct()
            ->where('status', 'Y')
            ->where('is_delete', 0)
            ->first();
        $images = [];
        if ($service->image_1) {
            $images[0] = $service->image_1;
        }
        if ($service->image_2) {
            $images[1] = $service->image_2;
        }
        if ($service->image_3) {
            $images[2] = $service->image_3;
        }
        if ($service->image_4) {
            $images[3] = $service->image_4;
        }
        if ($service->image_5) {
            $images[4] = $service->image_5;
        }
        if ($service->image_6) {
            $images[5] = $service->image_6;
        }
        
      
    
      

        return view('userpanel.servicedetail', compact('contactInfo', 'pageTitle', 'service', 'images', 'serviceList'));
    }
}
