<?php
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



// -----------------------------------------------------------------------------------
// هاذا الجروب الاساسي الي بيعمل تغير للغة الموقع كامل [عربي\انجليزي]ـ
  ## [ar\en] تقوم بتغير الغة حسب اختيار المستخدم
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{


  /**
   *  روابط مدراء المدارس
   *
   *  البداية
   */
    Route::group(['prefix' => 'supervisor'], function () {
        // supervisor
        ## عرض صفحة تسجيل الدخول
        Route::get('/login', 'Auth\supervisor\LoginController@showLoginForm')->name('supervisor.login');
        ## رابط التحقق من اسم المستخدم وكلمة المرور
        // -- لو صحيحة يتم التحويل للصفحة الرئيسي لمشرف
        Route::post('/login', 'Auth\supervisor\LoginController@login')->name('supervisor.login.seve');
        /**
         * كل الروابط بعد تسجيل الدخول
         * الخاصة به
         *
         */
        #2// الروابط الخاصة بـ:الاعدادات للمستخدم
		###############################################		
		#---------------
		Route::group(['prefix' => '/option/setting','middleware' => ['auth:supervisor']], function () {
			
			// اظافة البيانات الشخصية له
			// Route::get('/step_1', function () {
			// 	return response( view('admin.setting.step_1') );
            // })->name('admin.option.setting.step_1');
            
			// انشاء كلمت المرور عند اول تسجيل دخول
			// Route::get('/step_2', function () {
			// 	return response( view('admin.setting.step_2') );
            // })->name('admin.option.setting.step_2');
            
            // تعديل المعلومات الشخصية
            Route::post('store/{id}-'.md5('supervisor'),'SupervisorController@store' )->name('supervisor.store');
            // تغير كلمت المرور
			Route::post('update/'.md5('password').'/{id}-'.md5('supervisor'),'SupervisorController@passwordUpdate' )->name('supervisor.password.update');
		});
		#---------------
		###############################################
        Route::group(['middleware' => ['auth:supervisor'] ], function () {
            // رابط الصفحة الرئيسية له بعد تسجيل الدخول
            Route::get('/', function () {
                return redirect()->route('supervisor.home');
            });
            // او هاذا لصفحة الرئيسية
            Route::get('/home', 'HomeController@supervisor')->name('supervisor.home');


      
            // هنا باقي الروابط
        });
        // رابط تسجيل الخروج
        Route::post('/logout', 'Auth\supervisor\LoginController@logout')->name('supervisor.logout');
    });
    //------------------------------------- النهاية لروابط
});