<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\WorkingController;

Route::group([PublicController::class], function(){
    Route::get('/',[PublicController::class,'index']);
    Route::get('/about',[PublicController::class,'about']);
    Route::get('/news',[PublicController::class,'news']);
    Route::get('/news/{news}',[PublicController::class,'newsDetail'])->name('news.detail');
    Route::get('/working',[PublicController::class,'working']);
    Route::get('/working/{working}',[PublicController::class,'workingDetail'])->name('working.detail');
    Route::get('/partner',[PublicController::class,'partner']);
    Route::get('/partner/{partner}',[PublicController::class,'partnerDetail'])->name('partner.detail');
    Route::get('/gallery',[PublicController::class,'gallery']);
    Route::get('/gallery/{gallery}',[PublicController::class,'galleryDetail'])->name('gallery.detail');

});

Route::get('/download_links', function () {
    return view('download_links');
});

Route::get('/news/1', function () {
    return view('public.news.detail');
});
Route::get('/knowledge', function () {
    return view('knowledge');
});

Route::get('/partner/1', function () {
    return view('partner');
});
Route::get('/gallery-album', function () {
    return view('public.gallery-album');
});
Route::get('/album/1', function () {
    return view('pubic.gallery-album-images');
});

Route::middleware('guest')->group(function () {
    Route::get('/login_show', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [AdminController::class,'logout'])->name('logout')->middleware('auth');

Route::prefix('backend')->name('backend.')->middleware('auth')->group(function(){
    Route::resource('admin',AdminController::class);

    // menu
    Route::resource('menu',MenuController::class);
    Route::patch('/menu_status/{menu}',[MenuController::class, 'toggleStatus'])->name('menu.toggleStatus');

    // banner
    Route::resource('banner',BannerController::class);

    // about
    Route::resource('about',AboutController::class);

    // news
    Route::resource('news',NewsController::class);

    // working
    Route::resource('working',WorkingController::class);

    // partner
    Route::resource('partner',PartnerController::class);
  
    // gallery
    Route::resource('gallery',GalleryController::class);
  
    // album
    Route::resource('album',AlbumController::class);



});