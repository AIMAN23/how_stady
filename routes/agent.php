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
    Route::group(['prefix' => 'agent'], function () {
        // agent
        ## عرض صفحة تسجيل الدخول
        Route::get('/login', 'Auth\agent\LoginController@showLoginForm')->name('agent.login');
        ## رابط التحقق من اسم المستخدم وكلمة المرور
        // -- لو صحيحة يتم التحويل للصفحة الرئيسي لمشرف
        Route::post('/login', 'Auth\agent\LoginController@login')->name('agent.login.seve');
        /**
         * كل الروابط بعد تسجيل الدخول
         * الخاصة به
         *
         */
        Route::group(['middleware' => ['auth:agent'] ], function () {
            // رابط الصفحة الرئيسية له بعد تسجيل الدخول
            Route::get('/', function () {
                return redirect()->route('agent.home');
            });
            // او هاذا لصفحة الرئيسية
            Route::get('/home', 'HomeController@agent')->name('agent.home');


      
            // هنا باقي الروابط
        });
        // رابط تسجيل الخروج
        Route::post('/logout', 'Auth\agent\LoginController@logout')->name('agent.logout');
    });
    //------------------------------------- النهاية لروابط
});