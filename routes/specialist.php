<?php
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



// -----------------------------------------------------------------------------------
// هاذا الجروب الاساسي الي بيعمل تغير للغة الموقع كامل [عربي\انجليزي]ـ
  ## [ar\en] تقوم بتغير الغة حسب اختيار المستخدم
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{


  /**
   *  روابط الاخصائين
   *
   *  البداية
   */
    Route::group(['prefix' => 'specialist'], function () {
        // specialist
        ## عرض صفحة تسجيل الدخول
        Route::get('/login', 'Auth\specialist\LoginController@showLoginForm')->name('specialist.login');
        ## رابط التحقق من اسم المستخدم وكلمة المرور
        // -- لو صحيحة يتم التحويل للصفحة الرئيسي 
        Route::post('/login', 'Auth\specialist\LoginController@login')->name('specialist.login.seve');
        /**
         * كل الروابط بعد تسجيل الدخول
         * الخاصة به
         *
         */
        Route::group(['middleware' => ['auth:specialist'] ], function () {
            // رابط الصفحة الرئيسية له بعد تسجيل الدخول
            Route::get('/', function () {
                return redirect()->route('specialist.home');
            });
            // او هاذا لصفحة الرئيسية
            Route::get('/home', 'HomeController@specialist')->name('specialist.home');


      
            // هنا باقي الروابط
        });
        // رابط تسجيل الخروج
        Route::post('/logout', 'Auth\specialist\LoginController@logout')->name('specialist.logout');
    });
    //------------------------------------- النهاية لروابط
});