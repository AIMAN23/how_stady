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
  Route::get('/welcom', function() { return view('welcome'); })->name('login');
  Route::get('/getOptionCountry', 'HomeController@getOptionCountry')->name('get.Option.Country');

  
  // رابط تحويل كل المستخدمين لشاشة تسجبل الدخول الخاصة حسب نوع المستخدم
  Route::post('/', 'controllers\login\SwitchController@swhitchLogin')->name('switch.login');
  
  // روابط اظافة حساب مدرسة جديدة
  Route::view('school/register', 'school.register')->name('new.school');
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
	// Auth::routes();
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
  // ===============================روابط المشرف للمرحلة الدراسية =============================
  Route::group(['prefix' => 'supervisor'], function () {
    
    ####قبل تسجيل الدخول
    Route::get('/', function () {
        return redirect()->route('supervisor.home');
    });
    Route::get('login', 'Auth\supervisor\LoginController@showLoginForm')->name('supervisor.login');
    Route::post('login', 'Auth\supervisor\LoginController@login')->name('supervisor.login.seve');
    ##### بعد تسجيل الدخول
    Route::post('logout', 'Auth\supervisor\LoginController@logout')->name('supervisor.logout');
    Route::group(['middleware' => ['auth:super'] ], function () {
        Route::get('home', 'HomeController@supervisor')->name('supervisor.home');
    });
  });
  // ============================================================================
  // ===============================روابط  الوكيل للمدرسة=============================
  Route::get('/option/setting/step_1', function () {
    return response( view('agent.setting.step_1'));
    })->name('agent.option.setting.step_1')->middleware('auth:agent');
  Route::get('/option/setting/step_2', function () {
    return response( view('agent.setting.step_2'));
    })->name('agent.option.setting.step_2')->middleware('auth:agent');
  Route::get('/option/setting/step_3', function () {
    return response( view('agent.setting.step_3'));
    })->name('agent.option.setting.step_3')->middleware('auth:agent');
  Route::group(['prefix' => 'agent'], function () {
  
    ####قبل تسجيل الدخول
    Route::get('/', function () {
        return redirect()->route('agent.home');
    });
    Route::get('login', 'Auth\agent\LoginController@showLoginForm')->name('agent.login');
    Route::post('login', 'Auth\agent\LoginController@login')->name('agent.login.seve');
    ##### بعد تسجيل الدخول
    Route::post('logout', 'Auth\agent\LoginController@logout')->name('agent.logout');
    Route::group(['middleware' => ['auth:agent','status'] ], function () {
      Route::get('home', 'HomeController@agent')->name('agent.home');
    });
  });
  // ======================================================================================



});