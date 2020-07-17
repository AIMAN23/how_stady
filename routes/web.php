<?php
// تظمين المكتبات التي نحتاجلها
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\Route;
  // use Symfony\Component\HttpFoundation\Request;
  use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
// -----------------------------------------------------------------------------------


###################################################
###################################################
// بداية تعريف كل الروابط للنظام حسب كل مستخدم
###################################################
###################################################


// هاذا الجروب الاساسي الي بيعمل تغير للغة الموقع كامل [عربي\انجليزي]ـ
  ## [ar\en] تقوم بتغير الغة حسب اختيار المستخدم
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{  

  /**
   * روابط اشتراك مدرسة جديدة
   * 
   * أو إضافة حساب مدرسة جديدة
   * 
   * عملية تسجيل الاشتراك
   *  تكون على خمس خطوات وهي
   * البداية
   */
  Route::group(['prefix' => 'school'], function () { 

    ### 1- رابط يعرض صفحة تسجيل الاشتراك للمدرسة
    // --- عند الضغط على زر اشتراك مدرسة جديدة
    // --- يتم عرض صفحة ادخال البيانات الاساسية الخاصة بلمدرسة
    Route::view('school/register', 'school.register')->name('new.school');
    // 

    ### 2- رابط حفظ بيانات المدرسة
    ### ---- عند الظغط على زر الحفظ منالصفحة السابقة
    Route::post('school/seve/step1','SchoolController@newSchoolSeve' )->name('school.seve');
    // 

    ## 3- رابط ارسال البريد الالكتروني لتاكيد حساب المدرسة
    // --- يقوم بارسال رسالة بريد الكتروني للمدرسة من اجل
    // --- تاكيد البريد الخاص  بهم وعدم السماح بالعناوين الوهمية
    Route::get('school/{school_uuid}/step1','SchoolController@sendEmailRegisterSchool')->name('sendemail.register');
    // 
    
    
    ## 4- رابط عرض صفحة اكمال اعدادات الحساب 
    // --- هاذا الرابط يكون في الرسالة الذي تم ارسالها للبريد الالكتروني للمدرسة 
    // --- بعد ما يوصل للمدرسة البريد و يتم الضغط على تاكيد
    // --- تفتح لهم صفحة اكمال الخطوة 2 لاعداد
    // --- المراحل الدراسي
    // --- واظافة الحسابات العامة للمستخدمين النظام
    Route::get('school/{school_uuid}/step2','SchoolController@newSchoolDetails')->name('step2');
    // 

    ## 5- رابط حفظ الاعدادات التي تم تحديدها في الخطوة السابقة
    ## ---- يتم اضافة المراحل الدراسية و
    ## ---- اضافة الحسابات الستة الرئيسية للمستخدمين
    ##  1-المدير
    //  2-الوكبل
    //  3-شئون الطلاب
    //  4-المسؤل المالي
    //  5-السكرتاريا
    //  6-الاخصائي
    Route::post('school/{school_uuid}/step2','SchoolController@newSchoolDetails')->name('step2.seve');
    // 


    ## اخيرا هنا بعد اكمال الخطوات الخمس بنجاح
    ## رابط طباعة بطائق المستخدمين للمدرسة
    ## بعد انتهاء كل الخطوات الخمس السابقة يتم عرض صفحة تحتوي بطائق المستخدمين 
    ## لكي يتم طباعتها وتوزيع البطائق للمستخدمين لبدا الاستخدام للنظام
    Route::get('school/{school_uuid}/step3','SchoolController@step3')->name('step3');
    // 
  });
  ## انتهاء خطواة عملية انشاء حساب مدرسة جديدة
  // --------------------------------------------------------------------




  /**
   * رابط اختيار نوع المستخدم لتسجيل الدخول
   * 
   * بعد اختيار نوع المستخدم
   * واضغط زر التالي
   * يتم تحويل المستخدم الئ 
   * الرابط للصفحة تسجيل الدخول حسب ما تم اختيارة
   * وهاذا عن طريق الرابط التالي
   * 
   */
  // رابط تحويل كل المستخدمين لشاشة تسجبل الدخول الخاصة حسب نوع المستخدم
  Route::post('/', 'controllers\login\SwitchController@swhitchLogin')->name('switch.login');
  // ----------------------------------------------------------------------------------------




  
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
  

  
  /**
   *  روابط المشرفين 
   * للمستويات الدراسية 
   *  *  *  *  *  *
   *  *  *  * 
   * 
   */
  Route::group(['prefix' => 'supervisor'], function () {
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
    Route::group(['middleware' => ['auth:super'] ], function () {
      // رابط الصفحة الرئيسية له بعد تسجيل الدخول
      Route::get('/', function () { return redirect()->route('supervisor.home');  });
      // او هاذا لصفحة الرئيسية
      Route::get('home', 'HomeController@supervisor')->name('supervisor.home');


      
                    // باقي الروابط

      
    });
    // رابط تسجيل الخروج
    Route::post('/logout', 'Auth\supervisor\LoginController@logout')->name('supervisor.logout');
  });//------------------------------------- النهاية لروابط 
  


  /**
   *  روابط المعلمين 
   * 
   *  البداية
   */
  Route::group(['prefix' => 'teacher'], function () {
      // 
  });  
  //------------------------------------- النهاية لروابط
  
  



  
  












 #################### رابط قرائة الملفات الاكسل
	// Route::get('file', 'imageController@readingFile');
  // ---------------------------------------------------
  ###### بداية الروابط الاساسية للموقع ######
  
  // ------------------------------------------------
  //-------- رابط الصفحة الترحيبية
  // ------- عند فتح الموقع
  Route::get('/', function() { return view('welcome'); })->name('welcome');
  
  // ------------------------------------------------
  // -------رابط يعيد توجية المستخدم للصفحة الرئيسية
  // ------- في حالة لم يكن مسجل الدخول او حدث خطاء عند تسجيل الدخول
  Route::get('/welcom', function() { return view('welcome'); })->name('login');
  
  // ------------------------------------------------
  // -------- رابط يجيب اسماء الدول ورموزها
  // --------  لكي يتم اظافتها في مربع الاختيار للدولة
  Route::get('/getOptionCountry', 'HomeController@getOptionCountry')->name('get.Option.Country');



























// رابط الصفحة الرئيسية الافتراضية
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('admin/home', 'SchoolAdminController@home')->name('admin.home');
// Auth::routes();
###### نهاية الروابط الاساسية للموقع ######

### بداية الروابط تجريبية ##
 ######### الروابط الخاصة بعرض المخطط التجريبي #####
    // Route::get('chart-line', 'ChartController@chartLine');
    // Route::get('chart-line-ajax', 'ChartController@chartLineAjax');
 #######
### نهاية روابط تجريبية ##

















});
