<?php

use App\Http\Controllers\Adminpanel\AboutUs\CeoMessageController;
use App\Http\Controllers\Adminpanel\AboutUs\OurValuesController;
use App\Http\Controllers\Adminpanel\AboutUs\VisionMissionController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Adminpanel\DashboardController;
use App\Http\Controllers\Adminpanel\AboutUs\AboutUsController;
use App\Http\Controllers\Adminpanel\AboutUs\AwardsController;
use App\Http\Controllers\Adminpanel\AboutUs\OurStoryController;
use App\Http\Controllers\Adminpanel\ServicesController;
use App\Http\Controllers\Adminpanel\ContactUs\EnquiryController;
use App\Http\Controllers\Adminpanel\Products\CategoryController;
use App\Http\Controllers\Adminpanel\ContactUs\ContactUsController;
use App\Http\Controllers\Adminpanel\News\FeaturedNewsController;
use App\Http\Controllers\Adminpanel\News\NewsController;
use App\Http\Controllers\Adminpanel\News\TopStoriesController;
use App\Http\Controllers\Adminpanel\Products\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    return view('auth.login');
    //return view('welcome');
});

// Route::get('/', function () {
//     return view('customerportal.index');
//     //return view('welcome');
// });

// Route::get('/', [HomeController::class, 'index']);

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // });

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::view('profile', 'profile')->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('who-we-are-edit', [AboutUsController::class, 'index'])->name('who-we-are-edit');
    Route::put('save-who-we-are', [AboutUsController::class, 'update'])->name('save-who-we-are');

    Route::get('vision-mission-edit', [VisionMissionController::class, 'index'])->name('vision-mission-edit');
    Route::put('save-vision-mission', [VisionMissionController::class, 'update'])->name('save-vision-mission');

    Route::get('ceo-message-edit', [CeoMessageController::class, 'index'])->name('ceo-message-edit');
    Route::put('save-ceo-message', [CeoMessageController::class, 'update'])->name('save-ceo-message');

    Route::get('our-values-list', [OurValuesController::class, 'index'])->name('our-values-list');
    Route::get('/our-values-edit/{id}', [OurValuesController::class, 'edit'])->name('our-values-edit');
    Route::put('save-our-values', [OurValuesController::class, 'update'])->name('save-our-values');

    Route::get('our-stories-create', [OurStoryController::class, 'index'])->name('our-stories-create');
    Route::get('our-stories-list', [OurStoryController::class, 'list'])->name('our-stories-list');
    Route::post('new-our-stories', [OurStoryController::class, 'store'])->name('new-our-stories');
    Route::get('/edit-our-stories/{id}', [OurStoryController::class, 'edit'])->name('edit-our-stories');
    Route::put('save-our-stories', [OurStoryController::class, 'update'])->name('save-our-stories');
    Route::get('changestatus-our-stories/{id}', [OurStoryController::class, 'activation'])->name('changestatus-our-stories');
    Route::get('blockourstories/{id}', [OurStoryController::class, 'block'])->name('blockourstories');

    Route::get('service-page-content-edit', [ServicesController::class, 'index'])->name('service-page-content-edit');
    Route::put('save-service-page-content', [ServicesController::class, 'pageContentupdate'])->name('save-service-page-content');

    Route::get('services-create', [ServicesController::class, 'servicesCreate'])->name('services-create');
    Route::get('services-list', [ServicesController::class, 'list'])->name('services-list');
    Route::post('new-services', [ServicesController::class, 'store'])->name('new-services');
    Route::get('/edit-services/{id}', [ServicesController::class, 'edit'])->name('edit-services');
    Route::put('save-services', [ServicesController::class, 'update'])->name('save-services');
    Route::get('changestatus-services/{id}', [ServicesController::class, 'activation'])->name('changestatus-services');
    Route::get('blockservices/{id}', [ServicesController::class, 'block'])->name('blockservices');

    Route::get('awards-edit', [AwardsController::class, 'index'])->name('awards-edit');
    Route::put('save-awards', [AwardsController::class, 'update'])->name('save-awards');

    Route::get('news-create', [NewsController::class, 'index'])->name('news-create');
    Route::get('news-list', [NewsController::class, 'list'])->name('news-list');
    Route::post('new-news', [NewsController::class, 'store'])->name('new-news');
    Route::get('/edit-news/{id}', [NewsController::class, 'edit'])->name('edit-news');
    Route::put('save-news', [NewsController::class, 'update'])->name('save-news');
    Route::get('changestatus-news/{id}', [NewsController::class, 'activation'])->name('changestatus-news');
    Route::get('blocknews/{id}', [NewsController::class, 'block'])->name('blocknews');

    Route::get('top-stories-edit', [TopStoriesController::class, 'index'])->name('top-stories-edit');
    Route::put('save-top-stories', [TopStoriesController::class, 'update'])->name('save-top-stories');

    Route::get('featured-news-edit', [FeaturedNewsController::class, 'index'])->name('featured-news-edit');
    Route::put('save-featured-news', [FeaturedNewsController::class, 'update'])->name('save-featured-news');

    //geeshan
    //contactus
    Route::get('contact-info-edit', [ContactUsController::class, 'index'])->name('contact-info-edit');
    Route::put('save-contact-info', [ContactUsController::class, 'update'])->name('save-contact-info');

    Route::get('enquiry-list', [EnquiryController::class, 'listEnquiry'])->name('enquiry-list');
    Route::get('view-enquiry/{id}', [EnquiryController::class, 'view'])->name('view-enquiry');

    //products

    Route::get('new-category', [CategoryController::class, 'index'])->name('new-category');
    Route::post('save-category', [CategoryController::class, 'store'])->name('save-category');
    Route::get('category-list', [CategoryController::class, 'datalist'])->name('category-list');
    Route::get('/status-category/{id}', [CategoryController::class, 'activation'])->name('status-category');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');

    //subcategory
    Route::get('subcategory-list', [SubCategoryController::class, 'datalist'])->name('subcategory-list');
    Route::get('new-subcategory', [SubCategoryController::class, 'index'])->name('new-subcategory');
    Route::post('save-subcategory', [SubCategoryController::class, 'store'])->name('save-subcategory');
    Route::get('/edit-subcategory/{id}', [SubCategoryController::class, 'edit'])->name('edit-subcategory');
    Route::get('/status-subcategory/{id}', [SubCategoryController::class, 'activation'])->name('status-subcategory');
});

require __DIR__ . '/auth.php';
