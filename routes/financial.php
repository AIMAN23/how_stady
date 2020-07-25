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
    Route::group(['prefix' => 'financial'], function () {
        // financial
        ## عرض صفحة تسجيل الدخول
        Route::get('/login', 'Auth\financial\LoginController@showLoginForm')->name('financial.login');
        ## رابط التحقق من اسم المستخدم وكلمة المرور
        // -- لو صحيحة يتم التحويل للصفحة الرئيسي لمشرف
        Route::post('/login', 'Auth\financial\LoginController@login')->name('financial.login.seve');
        /**
         * كل الروابط بعد تسجيل الدخول
         * الخاصة به
         *
         */
        Route::group(['middleware' => ['auth:financial'] ], function () {
            // رابط الصفحة الرئيسية له بعد تسجيل الدخول
            Route::get('/', function () {
                return redirect()->route('financial.home');
            });
            // او هاذا لصفحة الرئيسية
            Route::get('/home', 'HomeController@financial')->name('financial.home');


      
            // هنا باقي الروابط
        });
        // رابط تسجيل الخروج
        Route::post('/logout', 'Auth\financial\LoginController@logout')->name('financial.logout');
    });
    //------------------------------------- النهاية لروابط
});