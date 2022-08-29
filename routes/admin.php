<?php

use App\Http\Controllers\Admin\AppSettingsController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TagsController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your Backend application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth'])->prefix('admin')->group(function(){



    Route::get('dashboard' , [DashboardController::class , 'index'])->name('admin.home');
    Route::get('contact' , [ContactController::class , 'index'])->name('admin.contact');
    Route::post('contact' , [ContactController::class , 'store']);

    Route::get('settings' , [SettingsController::class , 'index'])->middleware('password.confirm')->name('settings.index');
    Route::post('settings' , [SettingsController::class , 'edit'])->name('settings.edit');
    Route::get('settings/contact' , [SettingsController::class , 'contact'])->middleware('password.confirm')->name('settings.contact');
    Route::get('settings/about' , [SettingsController::class , 'about'])->middleware('password.confirm')->name('settings.about');
    Route::get('settings/socialMedia' , [SettingsController::class , 'socialMedia'])->middleware('password.confirm')->name('settings.socialMedia');

    Route::get('contacts' , [ContactController::class , 'index'])->name('contacts.index');
    Route::get('contacts/{id}' , [ContactController::class , 'show'])->name('contacts.show');
    Route::delete('contacts/{id}' , [ContactController::class , 'delete'])->name('contacts.delete');
    Route::resource('articles' , ArticlesController::class);
    Route::resource('categories' , CategoriesController::class);
    Route::resource('tags' , TagsController::class);

});
