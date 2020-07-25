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
    Route::group(['prefix' => 'student'], function () {
        // student
        ## عرض صفحة تسجيل الدخول
        Route::get('/login', 'Auth\student\LoginController@showLoginForm')->name('student.login');
        ## رابط التحقق من اسم المستخدم وكلمة المرور
        // -- لو صحيحة يتم التحويل للصفحة الرئيسي لمشرف
        Route::post('/login', 'Auth\student\LoginController@login')->name('student.login.seve');
        /**
         * كل الروابط بعد تسجيل الدخول
         * الخاصة به
         *
         */
        Route::group(['middleware' => ['auth:student'] ], function () {
            // رابط الصفحة الرئيسية له بعد تسجيل الدخول
            Route::get('/', function () {
                return redirect()->route('student.home');
            });
            // او هاذا لصفحة الرئيسية
            Route::get('/home', 'HomeController@student')->name('student.home');


      
            // هنا باقي الروابط
        });
        // رابط تسجيل الخروج
        Route::post('/logout', 'Auth\student\LoginController@logout')->name('student.logout');
    });
    //------------------------------------- النهاية لروابط
});