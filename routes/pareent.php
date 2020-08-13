<?php

// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



// -----------------------------------------------------------------------------------
// هاذا الجروب الاساسي الي بيعمل تغير للغة الموقع كامل [عربي\انجليزي]ـ
  ## [ar\en] تقوم بتغير الغة حسب اختيار المستخدم
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{


  /**
   *  روابط اولياء الامور
   *
   *  البداية
   */
    Route::group(['prefix' => 'pareent'], function () {
        // pareent
        ## عرض صفحة تسجيل الدخول
        Route::get('login', 'Auth\pareent\LoginController@showLoginForm')->name('pareent.login');
        ## رابط التحقق من اسم المستخدم وكلمة المرور
        // -- لو صحيحة يتم التحويل للصفحة الرئيسي   لولي الامر
        Route::post('login', 'Auth\pareent\LoginController@login')->name('pareent.login.seve');
        /**
         * كل الروابط بعد تسجيل الدخول
         * الخاصة به
         *
         */
        Route::group(['middleware' => ['auth:pareent'] ], function () {
            // رابط الصفحة الرئيسية له بعد تسجيل الدخول
            Route::any('/pareent','HomeController@pareent');
            // او هاذا لصفحة الرئيسية
            Route::get('home', 'HomeController@pareent')->name('pareent.home');


            // روابط جلب البيانات
            Route::group(['prefix' => 'get'], function () {
                Route::get('my-sons', function(){
                    return view('pareent.get.my-sons');
                })->name('pareent.get.my-sons');
                
            });
            // روابط طلب المساعدة
            Route::group(['prefix' => 'help'], function () {

               Route::get('/my/{problem}/', 
               function ($problem)
               {
                if ($problem != null) {
                       # code...
                       $data=$problem;
                       return response($data);
                   }else {
                       # code...
                       return 'no ajax';
                   }
               })->name('pareent.help');
            });

            Route::group(['prefix' => 'student'], function () {
                Route::get('show/{code}/'.md5(date('Y-m-d')), function ($code) {
                    $student= App\Models\StudentRegister::where('code',$code)->first();
                    return view('pareent.get.student_views.home', compact('student') );
                })->name('pareent.student.show');
            });


      
            // هنا باقي الروابط
        });
        // رابط تسجيل الخروج
        Route::post('logout', 'Auth\pareent\LoginController@logout')->name('pareent.logout');
    });
    //------------------------------------- النهاية لروابط
});