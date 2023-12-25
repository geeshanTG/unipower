<?php

namespace App\Http\Controllers\Userpanel;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\BottomBannerContent;
use App\Models\ContactInfo;
use App\Models\Faq;
use App\Models\IndustryInsight;
use App\Models\MainCategory;
use App\Models\MainSlider;
use App\Models\MiddleBannerContent;
use App\Models\News;
use App\Models\OurCoreProduct;
use App\Models\OurService;
use App\Models\OurTrustedPartner;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $mainSliders = MainSlider::where('status', 'Y')
            ->where('is_delete', 0)
            ->orderBy('order', 'ASC')
            ->get();
        $about = About::first();
        $partners = OurTrustedPartner::where('status', 'Y')
            ->where('is_delete', 0)
            ->get();
        $middleBanner = MiddleBannerContent::first();
        $mainCategories = MainCategory::where('status', 'Y')
            ->where('is_delete', 0)
            ->get();
        $coreProducts = OurCoreProduct::first();
        $ourServices = OurService::first();
        $services = Service::where('status', 'Y')
            ->where('is_delete', 0)
            ->orderBy('heading', 'ASC')
            ->get();
        $industryInsights = IndustryInsight::first();
        $news = News::where('status', 'Y')
            ->where('is_delete', 0)
            ->get();
        $bottomBanner = BottomBannerContent::first();
        $faqs = Faq::where('status', 'Y')
            ->orderBy('order', 'ASC')
            ->get();
        $contactInfo = ContactInfo::first();
        $serviceList = Service::select('id', 'heading')
            ->where('status', 'Y')
            ->where('is_delete', 0)
            ->orderBy('id', 'ASC')
            ->get();
          

        return view('userpanel.home', compact('contactInfo', 'mainSliders', 'about', 'partners', 'middleBanner', 'coreProducts', 'ourServices', 'services', 'mainCategories', 'industryInsights', 'news', 'bottomBanner', 'faqs','serviceList'));
    }
}
