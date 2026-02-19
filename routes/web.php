<?php

use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('pages.index');
});*/

Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])
    ->name('socialite.redirect');
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])
    ->name('socialite.callback');


Route::get('/about', [FrontPageController::class, 'about']);
Route::get('/page/{url_code}', [FrontPageController::class, 'page'])->middleware('mobile.only');
Route::get('/{url_code}', [FrontPageController::class, 'index'])->middleware('mobile.only');
