<?php
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



// -----------------------------------------------------------------------------------
// هاذا الجروب الاساسي الي بيعمل تغير للغة الموقع كامل [عربي\انجليزي]ـ
  ## [ar\en] تقوم بتغير الغة حسب اختيار المستخدم
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{


//   /**
//    *  روابط الوكلاء في المدارس
//    *
//    *  البداية
//    */
//     Route::group(['prefix' => 'agent'], function () {
//         // agent
//         ## عرض صفحة تسجيل الدخول
//         Route::get('/login', 'Auth\agent\LoginController@showLoginForm')->name('agent.login');
//         ## رابط التحقق من اسم المستخدم وكلمة المرور
//         // -- لو صحيحة يتم التحويل للصفحة الرئيسي 
//         Route::post('/login', 'Auth\agent\LoginController@login')->name('agent.login.seve');
//         /**
//          * كل الروابط بعد تسجيل الدخول
//          * الخاصة به
//          *
//          */
//         Route::group(['middleware' => ['auth:agent'] ], function () {
//             // رابط الصفحة الرئيسية له بعد تسجيل الدخول
//             Route::get('/', function () {
//                 return redirect('agent/home');
//             });
//             // او هاذا لصفحة الرئيسية
//             Route::get('/home', 'HomeController@agent')->name('agent.home');


      
//             // هنا باقي الروابط
//         });
//         // رابط تسجيل الخروج
//         Route::post('/logout', 'Auth\agent\LoginController@logout')->name('agent.logout');
//     });
//     //------------------------------------- النهاية لروابط





  /**
   * 
   * روابط الوكيل للمدرسة 
   *  *  *  *  *  * 
   *  *  *  *  * 
   */
  Route::group(['prefix' => 'agent'], function () {
    
    ## رابط عرض شاشة تسجيل الدخول للوكيل
    Route::get('login', 'Auth\agent\LoginController@showLoginForm')->name('agent.login');
    
    ## رابط التاكد من اسم المستحدم وكلمة المرور لكي يتم تسجيل الدخول 
    Route::post('login', 'Auth\agent\LoginController@login')->name('agent.login.seve');
    
    
    ##### بعد تسجيل الدخول بنجاح
    Route::get('/', function () {
        return redirect()->route('agent.home');
    });


    ### الطبقات الثلاث التي تتحقق من الخطوات الثلاث الاساسية للوكيل عند تسجيل الدخول للصفحة الخاصة به
    Route::group(['middleware' => ['auth:agent']], function () {
      
      ##1## التاكد من البيانات الاساسية للوكيل مثل:الاسم,العنوان,الايميل,الهاتف...الخ
      ## لو لم يتم ادخال بياناتة من قبل يتم
            #>>>> عرض شاشة ادخال البيانات الاساسية لحفظها في قاعدة البيانات
      Route::get('/option/setting/step_1', function () {      return response( view('agent.setting.step_1'));    })->name('agent.option.setting.step_1');
      ##2## التأكد من ان  تغير كلمة المرور الافتراضية الخاصة بة
      ##لو لم يتم
            #>>> تعرض له شاشة اعادة تعين كلمة المرور
      Route::get('/option/setting/step_2', function () {      return response( view('agent.setting.step_2'));    })->name('agent.option.setting.step_2');
      ##3## التأكد من ان كل المراحل الدراسية تم تعين لها مشرفين
      ## لو هناك مرحلة او اكثر من دون مشرف يتم
            #>>> عرض شاشة تعين المشرفين
            #>>>او تفعيل حساباتهم لو كانت موقفة في حالة السنة الجديدة
      Route::get('/option/setting/step_3', function () {      return response( view('agent.setting.step_3'));    })->name('agent.option.setting.step_3');

      ## انتهاء الخطوات
      
    });## اما اذا كل الخطوات قد تم اكمالها سابقاً فلايتم عرض اي شيء



    Route::post('logout', 'Auth\agent\LoginController@logout')->name('agent.logout');
    Route::group(['middleware' => ['auth:agent','status'] ], function () {
      Route::get('home', 'HomeController@agent')->name('agent.home');
    });
  });
  //------------------------------------- النهاية لروابط
});