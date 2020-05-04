<?php

use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('chart-line', 'ChartController@chartLine');
Route::get('chart-line-ajax', 'ChartController@chartLineAjax');
// ############################################
Route::post('formSubmit','ImageController@formSubmit');
// ############################################
Route::get('/back',function(){return redirect()->back()->with(['success_school' => 'تم اضافه العرض بنجاح ']);})->name('back');

// =============================================================================================================================
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	
	Route::get('/', function () { return view('welcome'); })->name('welcome');
	Route::get('/home', 'HomeController@index')->name('home');
	Auth::routes();


	Route::get('/new',function(){return view('school.form');})->name('new');
	Route::get('/d',function(){return view('school.d');})->name('d');
	Route::get('/dashbord',function(){return view('school.dashbord');})->name('dashbord');
	Route::get('/emplooyee',function(){return view('school.dashbord.emplooyee');})->name('emplooyee');
	Route::get('/student',function(){return view('school.dashbord.student');})->name('student');
	Route::get('/teacher',function(){return view('school.dashbord.teacher');})->name('teacher');
	Route::get('/level',function(){return view('school.dashbord.level');})->name('level');
	Route::get('/branche',function(){return view('school.dashbord.branche');})->name('branche');
	

	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	Route::get('/t', function()
	{
		// for ($i=0; $i < 10; $i++) { 
		// 	# code...
		// 	$c=;

		// 	return $c ;

		// }
		$d=1 ;$m=1;
		$s=time();
		for ($i=$s; $i < $s+100 ; $i++) { 
		
		if ($d==16) { 
			$d=1;$m++ ;
		}
		if ($m==13) {$m=1;}
		 User::create([
            'name' => 'x'.$i,
            'email' => 'a@'.$i.$d.$m.'-m.com',
            'password' => Hash::make('12345678'),
            'created_at'=> '2020-'.$m.'-'.$d.' 00:00:00', //date('Y-m-S H:i:s'),
        ]);

		 $d++;

		}
		 return redirect('\chart-line');
		
	});

	Route::get('test',function(){
		return View::make('test');
	});
});

############################# hasOne adress and belongsTo school#####################
Route::get('address-school', 'AddressController@AddressSchool')->name('address.school');
Route::get('school-address', 'SchoolController@SchoolAddress')->name('school.address');
############################# hasOne adress and belongsTo school#####################