<?php

namespace App\Http\Controllers\Userpanel;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Models\CeoMessage;
use App\Models\ContactInfo;
use App\Models\OurStory;
use App\Models\OurValue;
use App\Models\VisionMission;
use App\Models\WhoWeAre;

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

        return view('userpanel.aboutus', compact('pageTitle','whoWeAre','visionMission','ceoMessage','ourValues','ourStories','awards','contactInfo'));
    }

}
