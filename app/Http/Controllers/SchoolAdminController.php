<?php

namespace App\Http\Controllers;


// use App\Models\Classroom;
use DateTime;
use App\Models\File;
use App\Models\Level;
use App\Models\School;
use App\Models\Pareent;
// use App\Models\Classroom;
use App\Models\SchoolAdmin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\StudentRegister;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ReqDataAdmin;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\ReqAddressAdmin;
use App\Http\Requests\Admin\ReqPasswordAdmin;

class SchoolAdminController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
    }

    ################### home









    /**
     * تقوم بعرض الصفحة الرئيسية لمسؤل النطام
     *
     * @return view('admin.home')
     */
    public function home()
    {
        return view('admin.home');
    }










    /**
     * تقوم بحفظ وتحديث بيانات وعنوان مسؤل النظام الخاص بلمدرسة معينة 
     *
     * @param integer $id
     * @param ReqDataAdmin $request
     * @param SchoolAdmin $admin
     */
    public function store(int $id, SchoolAdmin $admin, Request $req)
    {
        //  $req=new Request;
        $m = $req->method();
        if ($m == "POST") {
            $admin = $admin->find($id);
            # code...
            $req->merge([
                'zip' => $req->country_code,
                'mobile' => $req->phone_no
            ]);


            $updateData_admin = $this->updateDataAdmin($admin, 'store', $req);
            $new_address = $this->updateAddressAdmin($admin, 'store',$req);

            if ($admin->status == 0) {
                $updateData_admin->update(['address_id' => $new_address->id, 'status' => '1']);
            }

            return redirect()->route('admin.home')->with(['success' => __('lang.update.success'),'tab_pane_3'=>'active']);

        } elseif ($m == 'GET') {
            return redirect()->route('admin.home')->with(['success' => ' method is get']);
        }


        // return response()->json($a);
    }
    ##################################









    /**
     * تحديث بيانات الادمن
     *
     * @param SchoolAdmin $admin
     * @param ReqDataAdmin $Data
     * @param string $action
     */
    public function updateDataAdmin(SchoolAdmin $admin, $action = 'update', $Data)
    {
        $reqData = new ReqDataAdmin;
        $validator = Validator::make($Data->all(), $reqData->rules());
         $validator->validated();
        if ($validator->fails()) {
            // return redirect()->route('admin.home')->withErrors($validator)->withInput();
        } else {
            // # code...

            $data = $Data->only(["name", "f_name", "p_name", "l_name", "gender", "nationality", "birthdate", "email", "mobile",]);
            // $a->update($request->all());
            $new_data = $admin->update($data);
            if ($action == 'store') {
                # code...
                // return $new_data;
            } else {
                // return redirect()->route('admin.home')->with(['success'=>__('lang.'.$action.'.success')]);
            }
        }
    }











    /**
     * تحديث عنوان الادمن
     *
     * @param SchoolAdmin $admin
     * @param ReqAddressAdmin $Address
     * @param string $action
     * 
     */
    public function updateAddressAdmin(SchoolAdmin $admin, $action = 'update',$Address)
    {
        $reqAddress = new ReqAddressAdmin;
            // $reqAddress->validated();
            $validator = Validator::make($Address->all(), $reqAddress->rules());
             $validator->validated();
            if ($validator->fails()) {
            } else {
                # code...
                $address = $Address->only(['cite', 'country', 'street', 'zip']);
                if ($admin->address_id == 0) {
                    $new_address = $admin->address()->create($address);
                } else {
                    $new_address = $admin->address()->update($address);
                }
                $action = $action;
                if ($action == 'store') {
                    // return $new_address;
                } else {
                    // return redirect()->route('admin.home')->with(['success'=>__('lang.'.$action.'.success')]);
                }
                // $a->update($request->all());
            }
    }










    /**
     * تقوم بتحديث كلمت مرور الادمن
     *
     * @param integer $id
     * @param ReqPasswordAdmin $request
     * @param SchoolAdmin $admin
     * 
     */
    public function passwordUpdate(int $id, ReqPasswordAdmin $request, SchoolAdmin $admin)
    {
        $admin = $admin->find($id);
        $admin->update(['password' => Hash::make($request->password)]);

        if ($admin->status < 2) $admin->update(['status' => 2]);


        return redirect()->route('admin.home')->with(['success' => __('lang.update.success')]);
    }

    
    
    
    
    
    
    
    
    ################### login admin school
    
    /**
     * تقوم بعرض صفحة تسجيل الدخول للادمن
     *
     */
    public function login()
    {
        return view('admin.auth.login');
    }

    // /////////////////////////////info










    /**
     * تعرض شاشة البيانات الاساسية للمدرسة
     *
     * @param uuid $school_uuid
     * @param uuid $admin_uuid
     */
    public function infoSchool($school_uuid, $admin_uuid)
    {
        return view('admin.info.school');
    }











    /**
     * تعرض شاشة المراحل الدراسة
     *
     * @param uuid $school_uuid
     * @param uuid $admin_uuid
     */
    public function infoLevels($school_uuid, $admin_uuid)
    {
        return view('admin.info.levels');
    }











    /**
     * تعرض شاشة الفصول الدراسية
     *
     * @param [type] $school_uuid
     * @param [type] $admin_uuid
     * @return void
     */
    public function infoClassrooms($school_uuid, $admin_uuid)
    {
        return view('admin.info.classrooms');
    }





    //////////////////////// add & view










    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [type] $school_uuid
     * @param [type] $admin_uuid
     * @return void
     */
    public function addStudent(Request $request, $school_uuid, $admin_uuid)
    {
        $method = $request->method();
        // عملية حفظ ملف الطلاب القديمة
        if ($method == 'POST') {
            if ($request->hasFile('csv')) {
                $data = $this->seveFileCsvStudentRigsterNewYaer('csv', $request);
            }

            $school_year = $request->school_year;
            // add level

            // add student_registers

            // return response()->json($tist);
        }

        if (!$this->sessput(session('school.id'))) {
            return false;
        }


        // $levels= School::levels()->cursor()->where('id',session('school.id'));


        // with(['school'=> function($g){
        //     $g->with('levels');
        //     }]  )->where('uuid',$admin_uuid)->first();
        // return ['s'=> $school_uuid, 'a'=> $admin_uuid];
        return view('admin.add.student');
    }




    // ////////////////////////get 










    /**
     * عرض المشرفين 
     *
     * @param Request $request
     * @param [type] $school_id
     * @return void
     */
    public function getaAllSupervisors(Request $request, $school_id)
    {
        if ($request->ajax()) {
            $s = School::find($school_id);
            $data = $s->supervisors();
            return view('admin.get.tb-supervisor', compact('data'));
        }
        return 'no ajax';
    }











    /**
     *  add غير كامل
     *  // $pathfrom=$request->$input->pathname;   // "pathname": "C:\\xampp\\tmp\\php6C87.tmp",
     *  // $size=$request->$input->size;           // "size": 7436
     *  // $mimeType=$request->$input->mimeType;   //"mimeType": "text/plain" 
     */
    public function seveFileCsvStudentRigsterNewYaer($input, $request)
    {
        $file_name_a = $request->$input->getClientOriginalName();
        $file_name = time() . '-' . $file_name_a;
        $path = $request->$input->move(public_path('storage\csv1'), $file_name);
        $z = filesize($path);










        /** 
         * // $p=Storage::isFile($path);
         * // $data= ImageController::f_parse_csv($path,$z,';');
         */
        $keys = ['no_student', 'stu_name', 'level_no', 'classroom_name', 'pareent_name', 'pareent_mobile', 'stu_gender'];
        $data = ImageController::csvToArray($path, ';', $z, $keys);

        $file = new File;
        $f = $file->create([
            'no' => time() . '-a' . Auth::user()->id . '-s' . session('school.id'),
            'status' => 0,
            'filename' => $file_name_a,
            'path' => $path,
            'description' => $request->description ?? '',
            'school_id' => session('school.id'),
            'school_admin_id' => Auth::user()->id,
        ]);
        $request->session()->put('fileStudents', ['id' => $f->id, 'path' => $f->path]);

        return $data;
    }









    /**
     * عرض شاشة اضافة معلم
     *
     * @param [type] $school_uuid
     * @param [type] $admin_uuid
     * @param Request $request
     * @return void
     */
    public function addTeacher($school_uuid, $admin_uuid, Request $request)
    {
        $method = $request->method();
        if ($method == 'GET') {
            # code...
            return view('admin.add.teacher');
        }
        if ($method == 'POST') {
            # code...
            // اظافة المعلم الى قاعدة البيانات
            // storeTeacher($request,)
            return 'method is POST';
        }
    }











    /**
     * عرض شاشة اضافة مشرف مرحلة
     *
     * @param [type] $school_uuid
     * @param [type] $admin_uuid
     * @return void
     */
    public function addSupervisor($school_uuid, $admin_uuid)
    {
        return view('admin.add.supervisor');
    }










    /**
     * عرض شاشة المراحل الدراسية
     * @param string $level_name
     */
    public function addLevel($level_name)
    {
        // $data_level = Level::where('name', $level_name)->first();
        // $school->levels()->attach($data_level->id);
        // $school->levels()->sync($data_level->id);
        // $school->levels()->syncWithoutDetaching($data_level->id);
        $schoolID = session('school.id');
        $school = School::find($schoolID);
        $FC_level = $school->levels()->firstOrCreate([
            'name' => $level_name,
            'school_id' => $school->id,
        ], [
            'uuid' => Str::uuid(),
            'code' => \strtoupper(Str::random()),
            'code_in_school' => '',
            'description' => __('ling.Description level'),
            'supervisor_id' => 0
        ]);
        // if ($step1) {
            // $step2 = $step1->update([
                
            // ]);
        // }

        if (!$this->sessput($schoolID)) {
            return false;
        }
        return redirect()->back()->with([
            'success' => __('lang.add.level.success', ['Level'=>$FC_level->langname()])
            ]);
    }











    /**
     * عرض رسالة تحذير قبل حذف مرحلة دراسية
     *
     * @param string $level_name //كود المرحلة الدراسي مثل "L1as" 
     * @return void
     */
    public function deleteLevelS1($level_name)
    {
        $school = session('school');
        $data_level = $school->Levels()->where('name', $level_name)->first();
        $level=$data_level->langname();
        // $school->levels()->attach($data_level->id);
        // $school->levels()->sync($data_level->id);
        // $school->levels()->syncWithoutDetaching($data_level->id);
        // $school->levels()->toggle($data_level->id);
        // $school->levels()->detach($data_level->id);
        // if(!$this->sessput(session('school.id'))){
        //     return false;
        // }
        return redirect()->back()->with([
            'w' => __('lang.delete.level.delete!', ['Level' => $level]) .'<br>code is :'.$data_level->code,
            'link' => route(
                'delete.level.ok',
                $data_level->uuid
            )
        ]);
        // return $level_name;
    }











    /**
     * حذف مرحلة دراسية بعد التاكيد
     *
     * @param [type] $level_uuid
     * @return void
     */


    public function deleteLevelS2($level_uuid)
    {
        $school = session('school');
        $data_level = $school->Levels()->where('uuid', $level_uuid)->first();
        $level=$data_level->langname();
        $data_level->delete();
        // $data_level = Level::where('name', $level_name)->first();
        // $school->levels()->attach($data_level->id);
        // $school->levels()->sync($data_level->id);
        // $school->levels()->syncWithoutDetaching($data_level->id);
        // $school->levels()->toggle($data_level->id);
        // $school->levels()->detach($data_level->id);
        if (!$this->sessput(session('school.id'))) {
            return false;
        }
        return redirect()->back()->with(['d' => __('lang.delete.level.success',['Level'=>$level])]);
        // return $level_name;
    }










    /**
     * اظافة المراحل الادراسية للمدرسة والرموز للمراحل في ملف السشن 
     *
     * @param int $id_school
     * @return void
     */
    public static function sessput($id_school)
    {

        $lh = [];
        $lb = [];
        $levels = School::find($id_school);

        if (!$levels) {
            return false;
        }

        $level = $levels->levels;
        foreach ($level as $ln) {
            $lh[] = $ln->name;
            $lb[] = $ln->description;
        }
        $lhh = array_combine($lh, $lh);
        $lbb = array_combine($lb, $lb);

        session()->put('lhh', $lhh);
        // session()->push('lhh',$lhh);
        session()->put('lbb', $lbb);
        // session()->push('lbb',$lbb);
        session()->put('levels', $level);
        return true;
    }
}
