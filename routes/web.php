<?php

use App\Models\Menu;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', function () {
    // $menus = Menu::whereNull('parent_id')
    // ->where('status', 1)
    // ->get();
    // $submenus = Menu::whereNotNull('parent_id')
    // ->where('status',1)->get();
    return view('index');
});
Route::get('/try',[MenuController::class, 'create']);
Route::get('/about', function () {

    return view('about');
});
Route::get('/download_links', function () {
    return view('download_links');
});
Route::get('/news', function () {
    return view('news');
});
Route::get('/news/1', function () {
    return view('news-detail');
});
Route::get('/knowledge', function () {
    return view('knowledge');
});
Route::get('/working-areas/1', function () {
    return view('working-areas');
});
Route::get('/partner/1', function () {
    return view('partner');
});
Route::get('/gallery-album', function () {
    return view('gallery-album');
});
Route::get('/album/1', function () {
    return view('gallery-album-images');
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
});