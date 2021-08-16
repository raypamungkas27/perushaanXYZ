<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',"HomeCT@index");

Auth::routes([
    "login" => false,
    'logout' => false
]);

Route::get('login',"AuthCT@login")->name('login');
Route::get('logout',"AuthCT@logout");
Route::post('login-post',"AuthCT@login_post");


Route::group(['middleware' => 'is_admin','middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('dashboard',"AdminCT@dashboard");

    Route::group(['prefix' => 'master'], function () {
        Route::resource('tim',"TimCT");
        Route::get('pemain/tim/{id}',"PemainCT@pemain_tim");
        Route::get('pemain/tim/create/{id}',"PemainCT@create");
        Route::get('pemain/tim/edit/{id}',"PemainCT@edit");
        Route::post('pemain/tim/create/save/{id}',"PemainCT@save");
        Route::post('pemain/tim/update/{id}',"PemainCT@update");
        Route::get('pemain/hapus/{id}',"PemainCT@delete");



        Route::resource('tanding',"TandingCT");
        Route::get('update/score/{id}',"TandingCT@update_score");
        Route::post('/save/score/{id}',"TandingCT@save_score");

        Route::get('score/{id}',"TandingCT@score");

        
        // Route::resource('artikel',"ArtikelCT");
        // route::post("uploadImgArtikel","ArtikelCT@upload")->name("upload");
    });
});


Route::get('select2/kota',"Select2CT@kota");
Route::get('select2/tim',"Select2CT@tim");
Route::get('select2/tim_tandang/{id}',"Select2CT@tim_tandang");

Route::get('select2/nama_pemain/{id}',"Select2CT@nama_pemain");







