<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
// هاذا الراوت الاساسي الي بيعمل تغير للغت الموقع كامل اي راوت في امشروع نظيفة داخل هاذا الراوت
##['prefix' => LaravelLocalization::setLocale()] تقوم بتغير الغة حسب اختيار المستخدم

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
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
	
	###### بداية الروابط الاساسية للموقع ######
	Route::get('/', function () { return view('welcome'); })->name('welcome');
	Route::get('/home', 'HomeController@index')->name('home');
	Auth::routes();
	###### نهاية الروابط الاساسية للموقع ######
	
	##############بداية الروابط للمستخدمين ###############



	##############نهاية الروابط للمستخدمين  ###############

});