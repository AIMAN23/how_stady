<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Level;
use App\Models\School;
use App\Models\Pareent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\StudentRegister;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Symfony\Component\Console\Helper;
use Illuminate\Support\Facades\Storage;
// كلاس خاص بعملية تسجيل الطلاب اول السنة
class StudentRegisterController extends Controller
{
    public function addStudentsCsv(Request $request , $level_id=1)
    {
        if ($request->method() == 'GET') {
            return view('admin.add.csv-students');
        }
        if ($request->ajax()) {
            $this->validate($request,[
                'level_uuid'=>'required',
                'csv' => 'required|mimes:prn,txt,csv',
                // 'csv' => 'mimetypes:text/csv,application/vnd.ms-excel,csv|mimes:csv,xls',
                'description'=>'required|max:100|min:4|string',
            ]);
            //
                // $validation= $request->validate([
                //     'level_uuid'=>'required',
                //     // 'csv' => 'mimes:application/vnd.ms-excel',
                //     'csv' => 'mimetypes:text/csv,application/vnd.ms-excel,csv|mimes:csv,xls',
                //     'description'=>'required',
                // ]);
            $school=School::find(session('school.id'));
            $level=Level::where('uuid',$request->level_uuid)->first();

            $path=$this->moveCsvStudent($request,$school->uuid);
            $keys=config('csv.student.keys');
            // $keys=[
            //     'no_student',
            //     'stu_name',
            //     'level_no',
            //     'classroom_name',
            //     'pareent_name',
            //     'pareent_mobile',
            //     'stu_gender'
            // ];
            $data_csv = $this->ajaxReadCsv($path,$keys,';');
            $csv_new=array();
            foreach ($data_csv as $s ) {
                // add class room
                $class['name']=$s['classroom_name'];
                // $class['level_id']=$level->id;
                $class['teacher_id']=0;
                $classroom=$this->addClassRoom($class,$school,$level);
                // add student
                $stu['no']=$s['no_student'] ;
                $stu['name']=$s['stu_name'] ;
                $stu['pareent_mobile']=$s['pareent_mobile'] ;
                $stu['pareent_name']=$s['pareent_name'] ;
                $stu['stu_gender']=$s['stu_gender'] ;
                // $stu['school_year']=$s['school_year'] ;
            $register= $this->registerStudent($stu,$school,$level,$classroom);
            $csv_new[]=$register;
            }

            return view('admin.add.tab',compact('csv_new'));

                // return 'no has file csv';

        }
        return 'no ajax';
    }
    //
    #####################################
    // اظافة الشعب الدراسية عند حفظ بيانات الطلاب من ملف الاكسل
    #####################################
    public function addClassRoom(array $attr ,$school,$level)
    {
        $school_id = $school->id;
        $level_id  = $level->id;
        $class  =   $school->
                        classrooms()
                        ->where('name',$attr['name'])
                        ->where('level_id',$level_id)
                        ->where('school_id',$school_id)
                        ;

        // $classr=$class->;

        if(isset($class)
            &&  Auth::user()->school_id == $school_id
            &&  $class->count() > 0
            )
        {
            $classroom =$class->first();
            return  $classroom;
        }else {
            # code...
            $classroom = $school
                ->classrooms()
                ->create([
                    'uuid' => Str::uuid(),
                    'name' => $attr['name'],
                    'code' =>'STU'.NO_time_and_random_int ?? str::random(),
                    'school_id' => $school->id,
                    'level_id' => $level->id,
                    'teacher_id' => $attr['teacher_id'] ?? 0,
                ]);
        }
        return $classroom;
    }
    ####################################
    // تسجيل الطالب اول السنة الدراسي
    #####################################
    public function registerStudent(array $attr, $school, $level, $classroom)
    {
        $dn = intval(date('Y'));
        $df = $dn + 1;
        // $student;
        // التأكد من اسم الطالب هل هو موجود
        // في نفس المرحلة و
        // المدرسة و
        // الشعلة الدراسي و
        // السنة الدراسية
        $student_validation
            = StudentRegister::where('name', $attr['name'])
            ->where('school_id', $school->id)
            ->where('level_id', $level->id)
            ->where('status', 0)
            ->where('classroom_id', $classroom->id)
            ->where('school_year', $attr['school_year'] ?? $df . '-' . $dn);
        //-------------------1
        if ($student_validation->count() < 1) {
            ###[2]// لو غير موجود اسم الطالب في السجلات
            //  يتم انشاء سجل جديد للطالب
            $student = $school->
            registers()
                ->firstOrCreate([
                    'code' => str::random(3) . time(),
                    'no' => $attr['no'],
                    'status' => $attr['status'] ?? 0,
                    'name' => $attr['name'],
                    'img' => $attr['img'] ?? 'student.png',
                    'school_year' => $attr['school_year'] ?? $df . '-' . $dn,
                    'student_id' => 0,
                    'school_id' => $school->id,
                    'level_id' => $level->id,
                    'classroom_id' => $classroom->id,
                    'schooladmin_id' => Auth::id(),
                ]);
            // ثم اكمال بيانات ولي الامر نفس ما تم في المرحلة السابقة
        }else {
            $student = $student_validation->first();
        }
        // ------------------2
        ##########################اظافة بيانات ولي الامر##########################
        $pareent = $this->firstOrCreatePareent($attr['pareent_mobile'], $attr['pareent_name']);
        #####################انتهاء اظافة بيانات ولي الامر##########################

        // بعد اضافة بيانات ولي الامر
        //  والتأكد منها يتم ربط الطالب بولي الامر
        //  عبر الايدي لولي الامر

        ########################ربط الطالب بولي الامر##########################
        $student->pareent_id =$pareent->id;
        $student->save();

        return $student;//->with('pareent')->first();
        ####################انتهاء ربط الطالب بولي الامر#####################
    }
    #####################################
    // اظافة او التأكد من حساب ولي الامر
    #####################################
    public function firstOrCreatePareent($mobile,$name)
    {
        // يتم التأكد من رقم ولي الامر لو موجود في السجل
        if (!empty($mobile)) {
            // يتم اظافة سجل ولي امر برقم الهاتف لربطة مع سجل الطالب
            $pareent = Pareent::firstOrCreate([
                'mobile' => $mobile,
            ]);
            $p_mobile=$pareent->mobile;
            // اظافة كلمة المرور رقم الهاتف في هاذة الحالة
            // $this->addNewPassNamePareent($pareent, $name, $pareent->mobile);
            $pareent->update([
                'uuid' => Str::uuid(),
                'name' => $name ?? null,
                'password'=> Hash::make($p_mobile),
                'status'=>1,
            ]);
            // ارجاع بيانات ولي الامر
            return $pareent;
        } else {
            # code...
            // اذا كان رقم ولي الامر غير مسجل مع البيانات في ملف الاكسل الذي تم رفعة
            // يتم اضافة حساب ولي امر بكود مكون من 12 رقم و3 حروف انجليزية ليتمكن من تسجيل الدخول
            $pareent = Pareent::firstOrCreate([
                'no' => 'PAR' . NO_time_and_random_int,
            ]);
            // كلمة المرور هي نفس الرقم الذي تم انتاجة تلقائي في هاذه الحالة
            $this->addNewPassNamePareent($pareent, $name, $pareent->no);
            // ارجاع بيانات ولي الامر
            return $pareent;
        }
    }
    #####################################
    //  اظافة كلمة مرور لولي الامر اذا كان
    // حسابة في المرحلة 0 لم يتم اكمال البيانات
    #####################################
    public function addNewPassNamePareent($pareent,$name,$pass){
        if ($pareent->status == 0) {
            # code...
            // اذا كان حساب ولي الامر حالتة
            // --------------------------
            //  [صفر =0]
            // اذن يتم اظافة كلمة المرور بنفس رقم الهاتف
            // واظافة اسم ولي الامر اذا كان موجود في السجل
            // -----------------------
            // اما لو حالة الحساب تساوي
            // [اكبر من 0]
            // لايتم عمل شيئ
            $pareent->update([
                'uuid' => Str::uuid(),
                'name' => $name ?? null,
                'password'=> Hash::make($pass),
                'status'=>1,
            ]);
            // ارجاع بيانات ولي الامر بعد اظافة كلمة المرور
            return $pareent;
        }
    }
    #####################################
    // حفظ ملف الاكسل في المجلد الخاص بلمدرسة في السرفر
    #####################################
    public function moveCsvStudent(Request $request,$school_uuid)
    {
     // old name file
        $file_name_a = $request->csv->getClientOriginalName();
        // $file_name = time() . '-' . $file_name_a;
     // new name file
        $file_name = date('Ymd-His',time())
                        .'-T'.time()
                        .'-SCH'.Auth::user()->school_id
                        .'-ADM'.Auth::user()->id
                        // .'-AUTH'.Auth::user()->getAuthIdentifierName()
                        .'-F_'.$file_name_a
                    ??
                    '-Time_'.time().'-AUTH_'.Auth::user()->id.'-F_'.$file_name_a;
        //
        $path = $request->csv->move(public_path('storage\csv\school\_'.$school_uuid), $file_name);
        // seve file in database
        // $file_path=\storage_path('\\csv\\school\\'.$school_uuid.'\\'.$file_name);
        $file=new File;
        $file->create([
            'no'=>time().'-a'.Auth::user()->id.'-s'.Auth::user()->school_id,
            'status'=>0,
            'filename'=>$file_name,
            'path'=> $path ,//?? $file_path,
            'description'=>$request->description ?? '',
            'school_id'=>session('school.id')?? Auth::user()->school()->id,
            'school_admin_id'=>Auth::user()->id,
        ]);

        return $path ; // $file_path ?? $path;
    }
    #####################################
    // قرائة بيانات الطلاب من ملف الاكسل
    #####################################
    public function ajaxReadCsv($path,$keys,$delimiter =';'){
        $z=filesize($path);
        // $data= ImageController::csvToArray($path,$delimiter,$z,$keys);
        $data= ImageController::csvToArray($path,$delimiter,$z,$keys);
        return $data;
    }
    #####################################
    // عرض اسماء الملفات الخاصة بلمدرسة في شاشة شؤن الطلاب
    #####################################
    public function allCsvIndirectory(){

        $school=Auth::user()->school()->first();
        // جلب الملفات من قاعدة البانات
        // $DBF= File::where('school_id',$school->id)->groupBy('created_at')->get();
        $DBF= File::where('school_id',$school->id)->orderby('created_at','desc')->get();
        // جلب الملفات من ملف التخزين
        $allcsv=array();
        $count=0;
        // جلب كل الملفات للمدرسة
        // $allcsv= Storage::files('public/csv/school/'.$school->uuid);//('public/csv1/1592852234-students12.csv');
        $all_path= Storage::allFiles(FILE_SCHOOL.'_'.$school->uuid);//('public/csv1/1592852234-students12.csv');
            // استخراج رابط وتاريخ الدعديل للملفات
            foreach ($all_path as $K=> $path) {
                // $file=Storage::extension($path);
                $file=Storage::lastModified($path);
                $url =Storage::url($path);
                $count=array_push($allcsv, [$url => $file]);
            }
            // ارجاع البيانات وطباعتها في الشاشة الوسيط
        return view('admin.get.csvfil', compact(['allcsv','count','DBF']));//->with('f',session('f'));

    }
}
