<?php

namespace App\Http\Controllers\Userpanel;
use App\Models\News;

use App\Models\Product;
use App\Models\Service;
use App\Models\TopStory;
use App\Models\ContactInfo;
use App\Models\FeaturedNews;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsAndEventController extends Controller
{
    public function index()
    {
        $pageTitle = 'NEWS & EVENTS';
        $contactInfo = ContactInfo::first();
        $serviceList = Service::select('id', 'heading')
        ->where('status', 'Y')
        ->where('is_delete', 0)
        ->orderBy('id', 'ASC')
        ->get();

        $topStoryId = TopStory::first();
        $topStory = [];
        $topStory[0] = News::where('news.id', '=', $topStoryId->top_story_news_1)->first();
        $topStory[1] = News::where('news.id', '=', $topStoryId->top_story_news_2)->first();

        $featuredNewsId = FeaturedNews::first();
        $featuredNews = [];
        $featuredNews[0] = News::where('news.id', '=', $featuredNewsId->featured_news_1)->first();
        $featuredNews[1] = News::where('news.id', '=', $featuredNewsId->featured_news_2)->first();
        $featuredNews[2] = News::where('news.id', '=', $featuredNewsId->featured_news_3)->first();

        $news = News::where('status', 'Y')
            ->where('is_delete', 0)
            ->whereNotIn('id', [$topStoryId->top_story_news_1, $topStoryId->top_story_news_2, $featuredNewsId->featured_news_1, $featuredNewsId->featured_news_2, $featuredNewsId->featured_news_3])
            ->orderBy('news_date', 'ASC')
            ->paginate(4);

        return view('userpanel.news', compact('contactInfo', 'pageTitle', 'topStory', 'featuredNews', 'news','serviceList'));
    }

    public function details($name, $id)
    {
        $pageTitle = 'NEWS';
        $newsId = decrypt($id);
        $contactInfo = ContactInfo::first();
        $serviceList = Service::select('id', 'heading')
        ->where('status', 'Y')
        ->where('is_delete', 0)
        ->orderBy('id', 'ASC')
        ->get();
        $news = News::where('id', $newsId)
            ->where('status', 'Y')
            ->where('is_delete', 0)
            ->first();
        $Allnews = News::where('status', 'Y')
            ->where('is_delete', 0)
            ->whereNotIn('id', [$news->id])
            ->orderBy('news_date', 'ASC')
            ->paginate(4);

        $images = [];
        if ($news->image_1) {
            $images[0] = $news->image_1;
        }
        if ($news->image_2) {
            $images[1] = $news->image_2;
        }
        if ($news->image_3) {
            $images[2] = $news->image_3;
        }
        if ($news->image_4) {
            $images[3] = $news->image_4;
        }

        return view('userpanel.newsdetail', compact('contactInfo', 'pageTitle', 'news', 'images', 'Allnews','serviceList'));
    }
     
}