<?php

use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Front\FrontController;
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

Route::get('/' , [FrontController::class , 'index'])->name('front.home');

Route::get('/article/{title}' , [FrontController::class , 'show'])->name('front.show');

Route::view('/about-us' , 'front.about')->name('about');
Route::view('/contact-us' , 'front.contact')->name('contact');
Route::get('articlesByTags/{tag}' , [FrontController::class , 'articlesByTags'])->name('articlesByTags');
require __DIR__.'/admin.php';
require __DIR__.'/auth.php';

