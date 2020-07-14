<?php

namespace App\Http\Controllers;


// use App\Models\Classroom;
use App\Models\File;
use App\Models\Level;
use App\Models\School;
// use App\Models\SchoolAdmin;
use App\Models\Pareent;
// use App\Models\Classroom;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\StudentRegister;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SchoolAdminController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        
    }

    ################### home
    public function home()
    {
        return view('admin.home');
    }

    ################### login admin school
    public function login()
    {
        return view('admin.auth.login');
    }

    // /////////////////////////////info
    public function infoSchool($school_uuid, $admin_uuid)
    {
        return view('admin.info.school');
    }
    public function infoLevels($school_uuid, $admin_uuid)
    {
        return view('admin.info.levels');
    }
    public function infoClassrooms($school_uuid, $admin_uuid)
    {
        return view('admin.info.classrooms');
    }
    //////////////////////// add & view
    public function addStudent(Request $request,$school_uuid, $admin_uuid)
    {
        $method=$request->method();
        // عملية حفظ الطلاب القديمة
        if($method== 'POST'){
            if ($request->hasFile('csv')) {
               $data = $this->seveFileCsvStudentRigsterNewYaer('csv',$request);
            }

            $school_year=$request->school_year;
            // add level

            // add student_registers

            // return response()->json($tist);
        }

        if(!$this->sessput(session('school.id'))){
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
    public function getaAllSupervisors(Request $request,$school_id){
        if ($request->ajax()) {
            $s=School::find($school_id);
            $data=$s->supervisors();
            return view('admin.get.tb-supervisor', compact('data') );
        }
        return 'no ajax';
    }
    //    
    // add غير كامل
    /**
     *  // $pathfrom=$request->$input->pathname;   // "pathname": "C:\\xampp\\tmp\\php6C87.tmp",
     *  // $size=$request->$input->size;           // "size": 7436
     *  // $mimeType=$request->$input->mimeType;   //"mimeType": "text/plain" 
     */
    public function seveFileCsvStudentRigsterNewYaer($input,$request){
        $file_name_a=$request->$input->getClientOriginalName();        
        $file_name=time().'-'.$file_name_a;
        $path = $request->$input->move(public_path('storage\csv1'), $file_name);
        $z=filesize($path);

        /** 
         * // $p=Storage::isFile($path);
         * // $data= ImageController::f_parse_csv($path,$z,';');
        */
        $keys=['no_student','stu_name','level_no','classroom_name','pareent_name','pareent_mobile','stu_gender'];
        $data= ImageController::csvToArray($path,';',$z,$keys);
        
        $file=new File;
        $f=$file->create([
            'no'=>time().'-a'.Auth::user()->id.'-s'.session('school.id'),
            'status'=>0,
            'filename'=>$file_name_a,
            'path'=>$path,
            'description'=>$request->description ?? '',
            'school_id'=>session('school.id'),
            'school_admin_id'=>Auth::user()->id,
        ]);
        $request->session()->put('fileStudents',['id'=> $f->id,'path'=>$f->path ]);

        return $data ;          
    }
    // عرض شاشة اضافة معلم
    public function addTeacher($school_uuid, $admin_uuid)
    {
        return view('admin\add\teacher');
    }
    // عرض شاشة اضافة مشرف مرحلة
    public function addSupervisor($school_uuid, $admin_uuid)
    {
        return view('admin\add\supervisor');
    }
    // عرض شاشة المراحل الدراسية
    public function addLevel($level_name)
    {
        // $data_level = Level::where('name', $level_name)->first();
        // $school->levels()->attach($data_level->id);
        // $school->levels()->sync($data_level->id);
        // $school->levels()->syncWithoutDetaching($data_level->id);
        $school=session('school');
        $school->levels()->firstOrCreate([
            'uuid'=>Str::uuid(),
            'name'=>$level_name,
            'code_in_school'=>'',
            'code'=>'',
            'description'=>'وصف المرحلة',
            'school_id'=>$school->id,
            'supervisor_id'=>0,
        ]);
        if(!$this->sessput(session('school.id'))){
            return false;
        }
        return redirect()->back()->with(['success'=>'add level success']);
    }
    // حذف
    public function deleteLevelS1($level_name)
    {
        $school=session('school');
        $data_level =$school->Levels()->where('name', $level_name)->first();
        // $school->levels()->attach($data_level->id);
        // $school->levels()->sync($data_level->id);
        // $school->levels()->syncWithoutDetaching($data_level->id);
        // $school->levels()->toggle($data_level->id);
        // $school->levels()->detach($data_level->id);
        // if(!$this->sessput(session('school.id'))){
        //     return false;
        // }
        return redirect()->back()->with(['w'=>' are you shor delete level'.__('lang.Level.'.$data_level->name) ,'link'=>route('delete.level.ok',$data_level->uuid) ]);
        // return $level_name;
    }
    public function deleteLevelS2($level_uuid)
    {
        $school=session('school');
        $data_level =$school->Levels()->where('uuid', $level_uuid)->first();
        $data_level->delete();
        // $data_level = Level::where('name', $level_name)->first();
        // $school->levels()->attach($data_level->id);
        // $school->levels()->sync($data_level->id);
        // $school->levels()->syncWithoutDetaching($data_level->id);
        // $school->levels()->toggle($data_level->id);
        // $school->levels()->detach($data_level->id);
        if(!$this->sessput(session('school.id'))){
            return false;
        }
        return redirect()->back()->with(['d'=>'delete level success']);
        // return $level_name;
    }

    public static function sessput($id_school)
    {

        $lh=[];
        $lb=[];
        $levels= School::find($id_school);
        if(!$levels){
            return false ;
        }
        
        $level= $levels->levels;
        foreach ($level as $ln) {
            $lh[]=$ln->name;
            $lb[]=$ln->description;
        }
        $lhh=array_combine($lh,$lh);
        $lbb=array_combine($lb,$lb);

        session()->put('lhh',$lhh);
        // session()->push('lhh',$lhh);
        session()->put('lbb',$lbb);
        // session()->push('lbb',$lbb);
        session()->put('levels',$level);
        return true;
    }


    //
}
