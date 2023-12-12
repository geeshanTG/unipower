<?php

use App\Http\Controllers\Adminpanel\AboutUs\AboutUsController;
use App\Http\Controllers\Adminpanel\ContactUs\ContactUsController;
use App\Http\Controllers\Adminpanel\ContactUs\EnquiryController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Adminpanel\DashboardController;


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


});

require __DIR__ . '/auth.php';
