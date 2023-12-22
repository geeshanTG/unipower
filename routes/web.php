<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Userpanel\HomeController;
use App\Http\Controllers\Userpanel\AboutController;
use App\Http\Controllers\Userpanel\SearchController;
use App\Http\Controllers\Userpanel\ContactController;
use App\Http\Controllers\Userpanel\ProductController;
use App\Http\Controllers\Userpanel\ServiceController;
use App\Http\Controllers\Adminpanel\MetaTagController;
use App\Http\Controllers\Adminpanel\Home\FaqController;
use App\Http\Controllers\Adminpanel\ServicesController;
use App\Http\Controllers\Adminpanel\DashboardController;
use App\Http\Controllers\Adminpanel\News\NewsController;
use App\Http\Controllers\Userpanel\NewsAndEventController;
use App\Http\Controllers\Adminpanel\AboutUs\AwardsController;
use App\Http\Controllers\Adminpanel\Home\HomeAboutController;
use App\Http\Controllers\Adminpanel\AboutUs\AboutUsController;
use App\Http\Controllers\Adminpanel\Home\MainSliderController;
use App\Http\Controllers\Adminpanel\News\TopStoriesController;
use App\Http\Controllers\Adminpanel\AboutUs\OurStoryController;
use App\Http\Controllers\Adminpanel\Home\OurServicesController;
use App\Http\Controllers\Adminpanel\AboutUs\OurValuesController;
use App\Http\Controllers\Adminpanel\ContactUs\EnquiryController;
use App\Http\Controllers\Adminpanel\Home\BottomBannerController;
use App\Http\Controllers\Adminpanel\Home\MiddleBannerController;
use App\Http\Controllers\Adminpanel\News\FeaturedNewsController;
use App\Http\Controllers\Adminpanel\Products\CategoryController;
use App\Http\Controllers\Adminpanel\Products\ProductsController;
use App\Http\Controllers\Adminpanel\AboutUs\CeoMessageController;
use App\Http\Controllers\Adminpanel\ContactUs\ContactUsController;
use App\Http\Controllers\Adminpanel\Home\OurCoreProductsController;
use App\Http\Controllers\Adminpanel\Products\SubCategoryController;
use App\Http\Controllers\Adminpanel\AboutUs\VisionMissionController;
use App\Http\Controllers\Adminpanel\Home\IndustryInsightsController;
use App\Http\Controllers\Adminpanel\Products\MainCategoryController;
use App\Http\Controllers\Adminpanel\Home\OurTrustedPartnersController;



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

Route::get('/', [HomeController::class, 'index']);
Route::get('about-us', [AboutController::class, 'index']);
Route::get('products', [ProductController::class, 'index']);
Route::get('getSubCategoriesWeb', [ProductController::class, 'getSubCategoriesWeb'])->name('getSubCategoriesWeb');
Route::get('getFilteredProducts', [ProductController::class, 'getFilteredProducts'])->name('getFilteredProducts');
Route::get('contact-us', [ContactController::class, 'index'])->name('contact-us');
Route::post('save-enquiry', [ContactController::class, 'store'])->name('save-enquiry');
Route::get('services', [ServiceController::class, 'index'])->name('services');
Route::get('service/{name}/{id}', [ServiceController::class, 'service'])->name('service');

Route::get('news', [NewsAndEventController::class, 'index'])->name('news');
Route::get('news_detail/{name}/{id}', [NewsAndEventController::class, 'details'])->name('news_detail');

Route::match(['get', 'post'],'search_result', [SearchController::class, 'search'])->name('search_result');

// Route::get('search_result', [SearchController::class, 'search'])->name('search_result');
// 




Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // });

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::view('profile', 'profile')->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('main-slider-create', [MainSliderController::class, 'index'])->name('main-slider-create');
    Route::get('main-slider-list', [MainSliderController::class, 'list'])->name('main-slider-list');
    Route::post('new-main-slider', [MainSliderController::class, 'store'])->name('new-main-slider');
    Route::get('/edit-main-slider/{id}', [MainSliderController::class, 'edit'])->name('edit-main-slider');
    Route::put('save-main-slider', [MainSliderController::class, 'update'])->name('save-main-slider');
    Route::get('changestatus-main-slider/{id}', [MainSliderController::class, 'activation'])->name('changestatus-main-slider');
    Route::get('blockmainslider/{id}', [MainSliderController::class, 'block'])->name('blockmainslider');

    Route::get('about-edit', [HomeAboutController::class, 'index'])->name('about-edit');
    Route::put('save-about', [HomeAboutController::class, 'update'])->name('save-about');

    Route::get('middle-banner-edit', [MiddleBannerController::class, 'index'])->name('middle-banner-edit');
    Route::put('save-middle-banner-content', [MiddleBannerController::class, 'update'])->name('save-middle-banner-content');

    Route::get('our-core-products-edit', [OurCoreProductsController::class, 'index'])->name('our-core-products-edit');
    Route::put('save-our-core-products', [OurCoreProductsController::class, 'update'])->name('save-our-core-products');

    Route::get('our-services-edit', [OurServicesController::class, 'index'])->name('our-services-edit');
    Route::put('save-our-services', [OurServicesController::class, 'update'])->name('save-our-services');

    Route::get('industry-insights-edit', [IndustryInsightsController::class, 'index'])->name('industry-insights-edit');
    Route::put('save-industry-insights', [IndustryInsightsController::class, 'update'])->name('save-industry-insights');

    Route::get('our-trusted-partners-create', [OurTrustedPartnersController::class, 'index'])->name('our-trusted-partners-create');
    Route::get('our-trusted-partners-list', [OurTrustedPartnersController::class, 'list'])->name('our-trusted-partners-list');
    Route::post('new-our-trusted-partners', [OurTrustedPartnersController::class, 'store'])->name('new-our-trusted-partners');
    Route::get('/edit-our-trusted-partners/{id}', [OurTrustedPartnersController::class, 'edit'])->name('edit-our-trusted-partners');
    Route::put('save-our-trusted-partners', [OurTrustedPartnersController::class, 'update'])->name('save-our-trusted-partners');
    Route::get('changestatus-our-trusted-partners/{id}', [OurTrustedPartnersController::class, 'activation'])->name('changestatus-our-trusted-partners');
    Route::get('blockourtrustedpartners/{id}', [OurTrustedPartnersController::class, 'block'])->name('blockourtrustedpartners');

    Route::get('bottom-banner-edit', [BottomBannerController::class, 'index'])->name('bottom-banner-edit');
    Route::put('save-bottom-banner-content', [BottomBannerController::class, 'update'])->name('save-bottom-banner-content');

    Route::get('faq-list', [FaqController::class, 'list'])->name('faq-list');
    Route::get('/edit-faq/{id}', [FaqController::class, 'edit'])->name('edit-faq');
    Route::put('save-faq', [FaqController::class, 'update'])->name('save-faq');
    Route::get('changestatus-faq/{id}', [FaqController::class, 'activation'])->name('changestatus-faq');

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

    Route::get('main-categories-create', [MainCategoryController::class, 'index'])->name('main-categories-create');
    Route::get('main-categories-list', [MainCategoryController::class, 'list'])->name('main-categories-list');
    Route::post('new-main-categories', [MainCategoryController::class, 'store'])->name('new-main-categories');
    Route::get('/edit-main-categories/{id}', [MainCategoryController::class, 'edit'])->name('edit-main-categories');
    Route::put('save-main-categories', [MainCategoryController::class, 'update'])->name('save-main-categories');
    Route::get('changestatus-main-categories/{id}', [MainCategoryController::class, 'activation'])->name('changestatus-main-categories');
    Route::get('blockmaincategories/{id}', [MainCategoryController::class, 'block'])->name('blockmaincategories');

    Route::get('sub-categories-create', [SubCategoryController::class, 'index'])->name('sub-categories-create');
    Route::get('sub-categories-list', [SubCategoryController::class, 'list'])->name('sub-categories-list');
    Route::post('new-sub-categories', [SubCategoryController::class, 'store'])->name('new-sub-categories');
    Route::get('/edit-sub-categories/{id}', [SubCategoryController::class, 'edit'])->name('edit-sub-categories');
    Route::put('save-sub-categories', [SubCategoryController::class, 'update'])->name('save-sub-categories');
    Route::get('changestatus-sub-categories/{id}', [SubCategoryController::class, 'activation'])->name('changestatus-sub-categories');
    Route::get('blocksubcategories/{id}', [SubCategoryController::class, 'block'])->name('blocksubcategories');

    Route::get('products-create', [ProductsController::class, 'index'])->name('products-create');
    Route::get('products-list', [ProductsController::class, 'list'])->name('products-list');
    Route::post('new-products', [ProductsController::class, 'store'])->name('new-products');
    Route::get('/edit-products/{id}', [ProductsController::class, 'edit'])->name('edit-products');
    Route::put('save-products', [ProductsController::class, 'update'])->name('save-products');
    Route::get('changestatus-products/{id}', [ProductsController::class, 'activation'])->name('changestatus-products');
    Route::get('blockproducts/{id}', [ProductsController::class, 'block'])->name('blockproducts');

    Route::get('getSubCategories', [ProductsController::class, 'getSubCategories'])->name('getSubCategories');

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

    Route::get('meta-tag-list', [MetaTagController::class, 'list'])->name('meta-tag-list');
    Route::get('edit-meta-tag/{id}', [MetaTagController::class, 'edit'])->name('edit-meta-tag');
    Route::put('adminpanel/save-meta-tag', [MetaTagController::class, 'update'])->name('save-meta-tag');
});

require __DIR__ . '/auth.php';
