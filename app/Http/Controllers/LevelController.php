<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Level;
use App\Models\School;
use App\Models\Classroom;
use App\Models\Supervisor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\StudentRegister;
use Illuminate\Support\Facades\Hash;

class LevelController extends Controller
{
 

    /**
     * @* @param array $attr 
     * [
     * 'status'=>0,
     * 'name'=>  not Nall,
     * 'code_in_school'=> '',
     * 'code'=>'',
     * 'description'=>'وصف المرحلة',
     * 'supervisor_id'=>0,
     * ]
     */
    public function FCreateLevel($school ,array $attr)
    {
        if(!$school->id)
        {
            return 'no has school id';
        }
        else
        {
            $level=$school->levels()->firstOrCreate([
                'uuid'=>New_Uuid ?? Str::uuid(),
                'status'=>$attr['status']??0,
                'name'=>$attr['name'],
                'code_in_school'=>$attr['code_in_school']??'',
                'code'=>$attr['code'] ??'',
                'description'=>$attr['description'] ??'وصف المرحلة',
                'supervisor_id'=>$attr['supervisor_id'] ?? 0,
                'school_id'=>$school->id,
            ]);
            return $level;
        }
        
    }
    // اظافة مشرف للمرحلة الدراسية او تعديل بياناته من قبل مسؤل النظام
    public function getlevel_And_Supervisor(Request $request, $level_code)
    {
        if ($request->ajax()) {
            $school = session('school');
            $s = School::find($school->id);
            $level = $s->levels()->where('name', $level_code)->first();
            // التاكد من ان المشرف تم تسجيله ام لا
            // لو لم يتم الاظافة يتم اظافة مشرف جديد
            // او ارجاع بيانات المرحلة مع المشرف الخاص بها
            if ($level->supervisor_id == 0) 
            {
            /*   $img = Image::create([
                    'no' => time(),
                    'status' => 0,
                    'img' => 'supervisor.png',
                ]);

                
            */
                $data= $s->supervisors();//->get();
                return response()->json($data);
                return view('admin.get.form-edit-level', compact('data'));
            }
            // $data = $level->with('supervisor')->where('name', $level_code)->first();
            // $data = Level::with('supervisor')->where('uuid', $level->uuid );//->get();
            $data = $level->supervisor()->get();//->get();
            return response()->json($data);
            return view('admin.get.form-edit-level', compact('data'));
        }
        return 'no ajax';
    }

    
    public function getClassRooms(Request $request, $level_code){
        // return"ok";
        if ($request->ajax()) {
            $school=session('school');
            $s=School::find($school->id);
            $level=$s->levels()->where('name', $level_code)->first();
            $classrooms=Classroom::where('level_id',$level->id);
            // $data=[$classrooms];
            // return $level->classrooms();
        // return response()->json($classrooms);
        return view('admin.get.classrooms',compact('classrooms') );
        }
        return 'no ajax';
    }

    public function getClassroomInfo(Request $request,$classroome_uuid){
        if($request->ajax()){

            $classroom=Classroom::where('uuid',$classroome_uuid)->first();
            return response()->json($classroom);
        }
        return 'no ajax';
    }
    public function getClassroomStudents(Request $request,$classroome_uuid){
        if($request->ajax()){

            $classroom=Classroom::where('uuid',$classroome_uuid)->first();
            // $students= StudentRegister::where('classroom_id',$classroom->id);
            $students= $classroom->registers();
            // $classroom->registers();
            return view('admin.get.table-students',compact('students'));
        }
        return 'no ajax';
        
    }

    /**
     * add supervisor in to level
     */
    public function storeSupervisor($uuid,Request $request,Level $level){
        $level=$level->where('uuid',$uuid)->first();

        $super=Supervisor::where('name',$request->supervisor_name )->first();
        // return response()->json($super);
        if (!empty($super->name)) {
            # code...
            $supervisor = $super;
        }else {
            # code...
            $supervisor = $level->supervisor()
                        ->create([
                            'no' => NO_Supervisor,
                            'uuid' => Str::uuid(),
                            'status' => 0,
                            'name' => $request->supervisor_name ??'اسم المشرف',
                            // 'f_name' => 'الاسم الاول',
                            // 'p_name' => 'اسم الاب',
                            // 'l_name' => 'القب',
                            // 'gender' => 3,
                            // 'nationality' => 'الجنسية',
                            // 'birthdate'=>'',
                            // 'email'=>'',
                            // 'mobile' => '+967'.random_int(10,999999999),
                            // 'email_verified_at'=>'',
                            'password' => Hash::make(NO_Supervisor) ?? Password_define,
                            // 'image_id' => $img->id,
                            'school_id' => School_id ?? $level->school->id,
                            // 'address_id' => 0,
                        ]);
        }

        $level->update(['supervisor_id' => $supervisor->id]);
        return redirect()->back()->withInput(['success' => 'تم اظافة مشرف المرحلة بنجاح']) ;
    }
}
