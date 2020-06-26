<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use Symfony\Component\HttpFoundation\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
// هاذا الراوت الاساسي الي بيعمل تغير للغت الموقع كامل اي راوت في امشروع نظيفة داخل هاذا الراوت
##['prefix' => LaravelLocalization::setLocale()] تقوم بتغير الغة حسب اختيار المستخدم
// 
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
	Route::get('file', 'imageController@readingFile');
	###### بداية الروابط الاساسية للموقع ######
  // رابط الصفحة الترحيبية
  Route::get('/', function() { return view('welcome'); })->name('welcome');
  Route::get('/p', function () {
      return view('testpagecards');
  })->name('p');

  
  // رابط تحويل كل المستخدمين لشاشة تسجبل الدخول الخاصة حسب نوع المستخدم
  Route::post('/', 'controllers\login\SwitchController@swhitchLogin')->name('switch.login');
  
  // روابط اظافة حساب مدرسة جديدة
  Route::view('school.register', 'school.register')->name('new.school');
  Route::post('school/seve/step1','SchoolController@newSchoolSeve' )->name('school.seve');
  Route::get('school/{school_uuid}/step1','schoolController@sendEmailRegisterSchool')->name('sendemail.register');
  Route::get('school/{school_uuid}/step2','schoolController@newSchoolDetails')->name('step2');
  Route::post('school/{school_uuid}/step2','schoolController@newSchoolDetails')->name('step2.seve');
  Route::get('school/{school_uuid}/step3','schoolController@step3')->name('step3');
  // "1d73b75d-7533-4545-9483-57f36864b8c9"
  // 
	// رابط الصفحة الرئيسية للموقع
	Route::get('/home', 'HomeController@index')->name('home');
	// Route::get('/home', 'HomeController@index')->name('home');
	// Route::get('admin/home', 'SchoolAdminController@home')->name('admin.home');
	Auth::routes();
	###### نهاية الروابط الاساسية للموقع ######
	
	### بداية الروابط تجريبية ##
	 ######### الروابط الخاصة بعرض المخطط التجريبي #####
			// Route::get('chart-line', 'ChartController@chartLine');
			// Route::get('chart-line-ajax', 'ChartController@chartLineAjax');
	 #######
	### نهاية روابط تجريبية ##


##############بداية الروابط للمستخدمين ###############


   ######### 2- abc school #########
   // روابط 
   ######### 3- abc school #########
   // روابط 
   ######### 4- abc school #########
   // روابط 
   ######### 5- abc school #########
   // روابط 
   ######### 6- abc school #########
   // روابط 
	##############نهاية الروابط للمستخدمين  ###############

});