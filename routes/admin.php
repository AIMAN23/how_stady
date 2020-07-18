<?php
// no users
	define('NO_time_and_random_int',time().random_int(1,99));
	define('NO_school', 'SCH'.NO_time_and_random_int );
	define('NO_manager', 'MAN'.NO_time_and_random_int );
	define('NO_agent', 'AGN'.NO_time_and_random_int );
	define('NO_admins', 'ADM'.NO_time_and_random_int );
	define('NO_financial', 'FIN'.NO_time_and_random_int );
	define('NO_secretary', 'SEC'.NO_time_and_random_int );
	define('NO_specialist', 'SPE'.NO_time_and_random_int );
	define('NO_Supervisor', 'SUP'.NO_time_and_random_int );
// 
	define('New_Uuid', Illuminate\Support\Str::uuid() );
	define('img',new App\Models\Image );
	define('School_id',session('school.id'));
	define('Code_levels',array('L1as', 'L2as', 'L3as', 'L4as', 'L5as', 'L6as', 'L7as', 'L8as', 'L9as', 'L1th', 'L2th', 'L3th'));
	define('Password_define',Illuminate\Support\Facades\Hash::make('123456789'));
// files path
	define('FILE_SCHOOL','public/csv/school/');
	

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
// هاذا الراوت الاساسي الي بيعمل تغير للغت الموقع كامل اي راوت في امشروع نظيفة داخل هاذا الراوت
##['prefix' => LaravelLocalization::setLocale()] تقوم بتغير الغة حسب اختيار المستخدم

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	/*
	|--------------------------------------------------------------------------
	| Admin Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register Admin routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| contains the "Admin" middleware group. Now create something great!
	|
	*/
	######### 1- admin school #########
	// روابط ادمن المدرسة شؤن الطلاب
	Route::group(['prefix' => '/admin'], function () {
		
		
		#1// روابط مسؤل المدرسة قبل تسجيل الدخول
		###############################################
		Route::get('/', function () { return redirect()->route('admin.home'); });
		Route::get('login', 'Auth\admin\LoginController@showLoginForm')->name('admin.login');
		Route::post('login', 'Auth\admin\LoginController@login')->name('admin.login.seve');
		###############################################
		
		#2// الروابط الخاصة بـ:مسؤل النظام في المدرسة بعد تسجيل الدخول
		###############################################		
		#---------------
		Route::group(['prefix' => '/option/setting','middleware' => ['auth:admin']], function () {
			
			// اظافة البيانات الشخصية له
			Route::get('/step_1', function () {
				return response( view('admin.setting.step_1'));})->name('admin.option.setting.step_1');
			// انشاء كلمت المرور عند اول تسجيل دخول
			Route::get('/step_2', function () {
				return response( view('admin.setting.step_2'));})->name('admin.option.setting.step_2');
		});
		#---------------
		###############################################


		Route::group(['middleware'=>['auth:admin','status']], function () {
		##############################################
		// رابط الصفحة الرئيسية لـ: شئون الطلاب
			Route::get('home', 'HomeController@admin')->name('admin.home');
			
				// Route::post('/option/contere', function (Illuminate\Http\Request $request) {
				// 	$filename='csv/students.csv';
				// 	$contents="رقم الطالب" ." , "."اسم الطالب"." , "."الشعبة الدراسي"." , "."تلفون ولي الامر"." , "."اسم ولي الامر"."";			
				// 	Storage::put($filename, $contents);
				// 	$download = Storage::download($filename);
				// 	//  Storage::allFiles();
				// 	return $download;
				// });
			// روابط الاضافة
			Route::group(['prefix' => '/add'], function () {		
			##################### add #########################
				Route::get('/student/csv/{school_uuid}${admin_uuid}$', 'StudentRegisterController@addStudentsCsv')->name('add.students.csv.view');
				Route::post('/student/csv', 'StudentRegisterController@addStudentsCsv')->name('add.students.csv');
				Route::get('/student/{school_uuid}${admin_uuid}$', 'SchoolAdminController@addStudent')->name('add.student');
				Route::post('/student/{school_uuid}${admin_uuid}$', 'SchoolAdminController@addStudent');
				Route::get('/teacher/{school_uuid}${admin_uuid}', 'SchoolAdminController@addTeacher')->name('add.teacher');
				Route::get('/supervisor/{school_uuid}${admin_uuid}', 'SchoolAdminController@addSupervisor')->name('add.supervisor');
				Route::get('/add/level/{school_uuid}', 'SchoolAdminController@addLevel')->name('add.level');
				Route::get('/delete/level/{level_name}', 'SchoolAdminController@deleteLevelS1')->name('delete.level');
				Route::get('/delete/{level_uuid}', 'SchoolAdminController@deleteLevelS2')->name('delete.level.ok');
			});


			// روابط عرض التفاصيل
			Route::group(['prefix' => '/info' ], function () {
			##################### info ########################
				Route::get('/school/{school_uuid}${admin_uuid}', 'SchoolAdminController@infoSchool')->name('info.school');
				Route::get('/levels/{school_uuid}${admin_uuid}', 'SchoolAdminController@infoLevels')->name('info.levels');
				Route::get('/classrooms/{school_uuid}${admin_uuid}', 'SchoolAdminController@infoClassrooms')->name('info.classrooms');
			});
			Route::group(['prefix' => '/all'], function () {
				// رابط يقوم بجلب سجلات الطلاب المسجلين في المدرسة
				Route::get('all\student', function () {		return view('admin.get.all-student');		})->name('all.student');
			});


			// روابط جلب البيانات
			Route::group(['prefix' => '/get' ], function () {
			##################### get #########################
				Route::get('classrooms/{level_code}','LevelController@getClassRooms')->name('get.classrooms');
				Route::get('classroom/info/{classroome_uuid}','LevelController@getClassroomInfo')->name('get.classroom.info');
				Route::get('classroom/students/{classroome_uuid}','LevelController@getClassroomStudents')->name('get.classroom.students');
				Route::get('all/csv/','StudentRegisterController@allCsvIndirectory')->name('get.all.csv');
				Route::get('all/supervisors/{school_id}','SchoolAdminController@getaAllSupervisors')->name('get.supervisors');
				Route::get('level/{level_code}/supervisor','LevelController@getlevel_And_Supervisor')->name('get.level.supervisor');
			});
		});

		#---------------
		// تسجيل الخروج
		Route::post('logout', 'Auth\admin\LoginController@logout')->name('admin.logout');

	});######### end admin #########
});######### end language #########