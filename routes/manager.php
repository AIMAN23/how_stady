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
    Route::group(['prefix' => 'manager'], function () {
        // manager
        ## عرض صفحة تسجيل الدخول
        Route::get('/login', 'Auth\manager\LoginController@showLoginForm')->name('manager.login');
        ## رابط التحقق من اسم المستخدم وكلمة المرور
        // -- لو صحيحة يتم التحويل للصفحة الرئيسي 
        Route::post('/login', 'Auth\manager\LoginController@login')->name('manager.login.seve');
        /**
         * كل الروابط بعد تسجيل الدخول
         * الخاصة به
         *
         */
        Route::group(['middleware' => ['auth:manager'] ], function () {
            // رابط الصفحة الرئيسية له بعد تسجيل الدخول
            Route::get('/', function () {
                return redirect()->route('manager.home');
            });
            // او هاذا لصفحة الرئيسية
            Route::get('/home', 'HomeController@manager')->name('manager.home');


      
            // هنا باقي الروابط
        });
        // رابط تسجيل الخروج
        Route::post('/logout', 'Auth\manager\LoginController@logout')->name('manager.logout');
    });
    //------------------------------------- النهاية لروابط
});