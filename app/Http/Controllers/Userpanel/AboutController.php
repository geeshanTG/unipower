<?php

namespace App\Http\Controllers\Userpanel;

use App\Models\Award;
use App\Models\Service;
use App\Models\OurStory;
use App\Models\OurValue;
use App\Models\WhoWeAre;
use App\Models\CeoMessage;
use App\Models\ContactInfo;
use App\Models\VisionMission;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $pageTitle = "About Us";
        $whoWeAre = WhoWeAre::first();
        $visionMission = VisionMission::first();
        $ceoMessage = CeoMessage::first();
        $ourValues = OurValue::get();
        $ourStories = OurStory::where('status', 'Y')->where('is_delete', 0)->orderBy('year', 'DESC')->get();
        $awards = Award::first();
        $contactInfo = ContactInfo::first();
        $serviceList = Service::select('id','heading')->where('status', 'Y')->where('is_delete', 0)->orderBy('id', 'ASC')->get();
    

        return view('userpanel.aboutus', compact('pageTitle','whoWeAre','visionMission','ceoMessage','ourValues','ourStories','awards','contactInfo','serviceList'));
    }

}
