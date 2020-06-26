<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
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
	   ######### 1- admin school #########
   // روابط ادمن المدرسة
	 Route::group(['prefix' => '/admin'], function () {
		 
		Route::get('/', function () { return redirect()->route('admin.home'); });
		Route::get('home', 'HomeController@home')->name('admin.home');
		Route::get('login', 'Auth\admin\LoginController@showLoginForm')->name('admin.login');
		Route::post('login', 'Auth\admin\LoginController@login')->name('admin.login.seve');
		Route::post('logout', 'Auth\admin\LoginController@logout')->name('admin.logout');	
		// Route::get('/view/login','SchoolAdminController@login' )->name('admin.login');
      // Route::get('/home', 'SchoolAdminController@home')->name('admin.home')->middleware('auth:admin');
			Route::get('ms-f', function () {
				return view('ms-f');
		})->name('msf');


		Route::group(['prefix' => '/add','middleware'=>'auth:admin'], function () {		
			
			Route::post('/student/csv', 'SchoolAdminController@addStudentsCsv')->name('add.students.csv');
			Route::get('/student/{school_uuid}${admin_uuid}$', 'SchoolAdminController@addStudent')->name('add.student');
			Route::post('/student/{school_uuid}${admin_uuid}$', 'SchoolAdminController@addStudent');
			Route::get('/teacher/{school_uuid}${admin_uuid}', 'SchoolAdminController@addTeacher')->name('add.teacher');
			Route::get('/supervisor/{school_uuid}${admin_uuid}', 'SchoolAdminController@addSupervisor')->name('add.supervisor');
			Route::get('/add/level/{school_uuid}', 'SchoolAdminController@addLevel')->name('add.level');
			Route::get('/delete/level/{level_name}', 'SchoolAdminController@deleteLevelS1')->name('delete.level');
			Route::get('/delete/{level_uuid}', 'SchoolAdminController@deleteLevelS2')->name('delete.level.ok');
		});

		Route::group(['prefix' => '/info' ,'middleware'=>'auth:admin'], function () {

			Route::get('/school/{school_uuid}${admin_uuid}', 'SchoolAdminController@infoSchool')->name('info.school');
			Route::get('/levels/{school_uuid}${admin_uuid}', 'SchoolAdminController@infoLevels')->name('info.levels');
			Route::get('/classrooms/{school_uuid}${admin_uuid}', 'SchoolAdminController@infoClassrooms')->name('info.classrooms');
		});
		Route::group(['prefix' => '/get' ,'middleware'=>'auth:admin'], function () {
			Route::get('classrooms/{level_code}','LevelController@getClassRooms')->name('get.classrooms');
			Route::get('classroom/info/{classroome_uuid}','LevelController@getClassroomInfo')->name('get.classroom.info');
			Route::get('classroom/students/{classroome_uuid}','LevelController@getClassroomStudents')->name('get.classroom.students');
				
		});
		
	});

	// Route::group(['prefix' => 'admin'], function () {

		
	// });

	
});