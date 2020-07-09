<?php

namespace App\Http\Controllers;


// use App\Models\Classroom;
use App\Models\File;
use App\Models\Level;
use App\Models\School;
// use App\Models\SchoolAdmin;
use App\Models\Classroom;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\StudentRegister;
use Illuminate\Support\Facades\Auth;
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
        return view('admin\home');
    }

    ################### login admin school
    public function login()
    {
        return view('admin\auth\login');
    }

    // /////////////////////////////info
    public function infoSchool($school_uuid, $admin_uuid)
    {
        return view('admin\info\school');
    }
    public function infoLevels($school_uuid, $admin_uuid)
    {
        return view('admin\info\levels');
    }
    public function infoClassrooms($school_uuid, $admin_uuid)
    {
        return view('admin\info\classrooms');
    }
    //////////////////////// add
    public function addStudent(Request $request,$school_uuid, $admin_uuid)
    {
        $method=$request->method();
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
        return view('admin\add\student');
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
    public function addStudentsCsv(Request $request , $level_id=1)
    {
        if ($request->method() == 'GET') {
            return view('admin\add\csv-students');
        }
        if ($request->ajax()) {
            $school=School::find(session('school.id'));
            $level=Level::where('uuid',$request->level_uuid)->first();
            
            $path=$this->moveCsvStudent($request);
            $keys=[
                'no_student',
                'stu_name',
                'level_no',
                'classroom_name',
                'pareent_name',
                'pareent_mobile',
                'stu_gender'];
            $data_csv = $this->ajaxReadCsv($path,$keys);

            foreach ($data_csv as $s ) {
                // add class room
                $class['name']=$s['classroom_name'];
                // $class['level_id']=$level->id;
                $class['teacher_id']=0;
            $classroom=$this->addClassRoom($class,$school,$level);
                // add student
                $stu['no']=$s['no_student'] ;
                $stu['name']=$s['stu_name'] ;
                // $stu['school_year']=$s['school_year'] ;
            $register= $this->registerStudent($stu,$school,$level,$classroom);

            }

            return view('admin\add\tab',compact('data_csv'));
            
                // return 'no has file csv';
            
        }
        return 'no ajax';
    }


    public function addClassRoom(array $attr ,$school,$level)
    {
        $class=$school->classrooms()->where('name',$attr['name'])->where('level_id',$level->id)->first();

        // $classr=$class->;

        if(isset($class) && $class->count() > 0){
            return $class;
        }
        $classroom = $school->classrooms()->firstOrCreate([
                'uuid' => Str::uuid(),
                'name' => $attr['name'],
                'code' => str::random(),
                'school_id' => $school->id,
                'level_id' => $level->id,
                'teacher_id' => $attr['teacher_id'] ?? 0,
            ]);
        return $classroom;
    }
    public function registerStudent(array $attr ,$school,$level,$classroom)
    {
        $dn=intval(date('Y'));
        $df= $dn+1;
        
        $register = $school->registers()->firstOrCreate([
            'code' =>str::random(3).time(),
            'no'=>$attr['no'],
            'status'=>$attr['status']??0,
            'name'=>$attr['name'],
            'img'=>$attr['img']??'student.png',
            'school_year'=>$attr['school_year']?? $df.'-'.$dn,
            'student_id'=>0,
            'school_id'=>$school->id,
            'level_id' => $level->id,
            'classroom_id'=>$classroom->id,
            'schooladmin_id'=>Auth::id(),
            ]);
        return $register;
    }
    public function moveCsvStudent(Request $request)
    {
        $file_name_a = $request->csv->getClientOriginalName();
        // $file_name = time() . '-' . $file_name_a;
        $file_name = time().'-a'.Auth::user()->id.'-s'.session('school.id').$file_name_a;
        $path = $request->csv->move(public_path('storage\csv\school'), $file_name);
        return $path;
    }
    public function ajaxReadCsv($path,$keys){
        $z=filesize($path);
        
        $data= ImageController::csvToArray($path,';',$z,$keys);
        return $data;
    }

    public function allCsvIndirectory(){
        // if(isset(session('school.id')) ){
        //     $school_id=session('school.id');

        // }else{
        //     $school_id='';
        // }
        $allcsv= Storage::directories();//('public/csv1/1592852234-students12.csv');
        return view('admin\get\csvfil', compact('allcsv'));
        
    }

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


    public function addTeacher($school_uuid, $admin_uuid)
    {
        return view('admin\add\teacher');
    }
    public function addSupervisor($school_uuid, $admin_uuid)
    {
        return view('admin\add\supervisor');
    }
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
