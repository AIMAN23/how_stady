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
    Route::group(['prefix' => 'secretary'], function () {
        // secretary
        ## عرض صفحة تسجيل الدخول
        Route::get('/login', 'Auth\secretary\LoginController@showLoginForm')->name('secretary.login');
        ## رابط التحقق من اسم المستخدم وكلمة المرور
        // -- لو صحيحة يتم التحويل للصفحة الرئيسي لمشرف
        Route::post('/login', 'Auth\secretary\LoginController@login')->name('secretary.login.seve');
        /**
         * كل الروابط بعد تسجيل الدخول
         * الخاصة به
         *
         */
        Route::group(['middleware' => ['auth:secretary'] ], function () {
            // رابط الصفحة الرئيسية له بعد تسجيل الدخول
            Route::get('/', function () {
                return redirect()->route('secretary.home');
            });
            // او هاذا لصفحة الرئيسية
            Route::get('/home', 'HomeController@secretary')->name('secretary.home');


      
            // هنا باقي الروابط
        });
        // رابط تسجيل الخروج
        Route::post('/logout', 'Auth\secretary\LoginController@logout')->name('secretary.logout');
    });
    //------------------------------------- النهاية لروابط
});