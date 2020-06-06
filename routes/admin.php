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
	| Admin Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register Admin routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| contains the "Admin" middleware group. Now create something great!
	|
	*/
	Route::group(['prefix' => 'admin'], function () {
		
		Route::get('/', function ($id) {
			return view('user.admin.home');
		});
	});

	// Route::group(['prefix' => 'admin'], function () {

		
	// });

	
});