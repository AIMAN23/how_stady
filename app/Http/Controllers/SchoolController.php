<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Traits\imgTrait;
// use App\Http\Requests\Step2;
use Illuminate\Support\Str;
use App\Http\Requests\Step1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SchoolController extends Controller
{
    use imgTrait;

    ###
    public function newSchoolSeve(Step1 $request)
    {
        $school = new School;
        // table المرحلة 1 حفظ الصورة والعنوان والبيانات
        ### img اذا تم اختيار الصورة يقوم بتغير اسمها وحفظها في مجلد الصور للمدارس
        $imgName = $this->moveLogoSchool($request);
        ### address اظافة بيانات عنوان المدرسة في جدول المدارس
        $address = $this->seveAddressSchool($request, $school);
        ### school details حفظ بيانات المدرسة في جدول المدارس
        $dataschool = $this->seveDataSchool($school, $request, $imgName, $address);
        ### session  اظافة كود المدرسة في ملف التشغيل
        $this->add_Uuid_School_Session($dataschool['uuid']);
        $school->update(['status' => 0]);
        // المرحلة 2 ارسال ايميل لبريد المدرسة من اجل اتمام الاعدادات للحساب
        // $this->sendEmailRegisterSchool($dataschool['uuid']);
        ### send email ارسال ايميل للمدرسة لتاكيد الحساب واتمام عملية التسجيل
        return redirect()->route('sendemail.register', ['school_uuid' => $dataschool['uuid']]);

        // انتهاء التسجيل لحساب المدرسة
    }
    ###
    public function newSchoolDetails(Request $request, $school_uuid)
    {
        $method = $request->method();
        $school = $this->getSchool($school_uuid);
            if ($school->status == 0) {
                return redirect()->route('sendemail.register', ['school_uuid' => $school['uuid']]);
            }
            if ($method == 'GET') {
                if ($school->status == 1 or $school->status == 2 ) {
                    $this->add_Uuid_School_Session($school_uuid);
                    $school->update(['status' => 2]);
                    return view('school.register.step2')->with('school', $school);
                } else {
                    // return abort(404, 'هاذه الخطوة قد تم اتمامها بنجاح ولايمكن زيارتها مره اخرا');
                    return redirect()->route('step'.$school->status,$school->uuid);
                }
            }

            if ($method == 'POST') {

                if ($school->status == 1) {
                    // return abort(404);
                    return redirect()->route('step'.$school->status,$school->uuid);
                } elseif ($school->status == 2) {
                    // التحقق من ملىء البيانات كاملة 
                    $request->validate([
                        'manager' => 'required|max:255',
                        'agent' => 'required|max:255',
                        'school_admin' => 'required|max:255',
                        'financial' => 'required|max:255',
                        'secretarie' => 'required|max:255',
                        'specialist' => 'required|max:255',
                    ]);
                    // ===================================
                    # code...
                    $levels = Code_levels;

                    // $school ->levels()-> attach($request -> levelIds);  // many to many insert to database
                    //$school ->levels()-> sync($request -> levelIds);
                    // $s = new School;
                    $NO_manager =NO_manager;
                    $manager = $school->manager()->create([
                        'uuid' => Str::uuid(),
                        'name' => $request['manager'],
                        // 'email' => $request['email'],
                        'school_id' => $school->id,
                        'address_id' => 0,
                        'no' => $NO_manager,
                        'password' => Hash::make($NO_manager),
                    ]);
                    $NO_agent =NO_agent;
                    $agent = $school->agent()->create([
                        'uuid' => Str::uuid(),
                        'name' => $request['agent'],
                        // 'email' => $request['email'],
                        'school_id' => $school->id,
                        'address_id' => 0,
                        'no' => $NO_agent,
                        'password' => Hash::make($NO_agent),
                    ]);
                    $NO_admins =NO_admins;
                    $admins = $school->admins()->create([
                        'uuid' => Str::uuid(),
                        'name' => $request['school_admin'],
                        // 'email' => $request['email'],
                        'school_id' => $school->id,
                        'address_id' => 0,
                        'no' => $NO_admins,
                        'password' => Hash::make($NO_admins),
                    ]);
                    $NO_financial =NO_financial;
                    $financial = $school->financial()->create([
                        'uuid' => Str::uuid(),
                        'name' => $request['financial'],
                        // 'email' => $request['email'],
                        'school_id' => $school->id,
                        'address_id' => 0,
                        'no' => $NO_financial,
                        'password' => Hash::make($NO_financial),
                    ]);
                    $NO_secretary =NO_secretary;
                    $secretary = $school->secretary()->create([
                        'uuid' => Str::uuid(),
                        'name' => $request['secretarie'],
                        // 'email' => $request['email'],
                        'school_id' => $school->id,
                        'address_id' => 0,
                        'no' => $NO_secretary,
                        'password' => Hash::make($NO_secretary),
                    ]);
                    $NO_specialist =NO_specialist;
                    $specialist = $school->specialist()->create([
                        'uuid' => Str::uuid(),
                        'name' => $request['specialist'],
                        // 'email' => $request['email'],
                        'school_id' => $school->id,
                        'address_id' => 0,
                        'no' => $NO_specialist,
                        'password' => Hash::make($NO_specialist),
                    ]);


                    foreach ($levels as $level) {
                        if ($request->$level) {
                            // $data_level = Level::where('name', $level)->first();
                            // $school->levels()->attach($data_level->id);
                            // $school->levels()->sync($data_level->id);
                            $school->levels()->create([
                                'uuid'=>Str::uuid(),
                                'name'=>$level,
                                'code_in_school'=>'',
                                'code'=>'',
                                'description'=>'وصف المرحلة',
                                'school_id'=>$school->id,
                                'supervisor_id'=>0,
                            ]);
                            // $school->levels()->syncWithoutDetaching($data_level->id);
                        }
                    }
                    $cards=[
                        'manager'=>$manager,
                        'agent'=>$agent,
                        'admins'=>$admins,
                        'financial'=>$financial,
                        'secretary'=>$secretary,
                        'specialist'=>$specialist,
                    ];
                    $school->update(['status' => 3]);
                    // return response()->json($request);
                    return redirect()->route('step3', ['school_uuid' => $school['uuid']])->with(['cards'=> $cards]);
                } else {
                    # code...
                    return redirect()->route('step'.$school->status,$school->uuid);
                }
            }
        

        // return response()->json($school);
        // $school->level()->create([]);
    }



    public function sendEmailRegisterSchool($school_uuid)
    {
        $uuid = $school_uuid;
        // $sc=School::with('address')->where('uuid','=',$uuid)->first();
        // return response()->json($sc);
        ## استدعاء بيانات المدرسة لارسالها في رساله ايميل
        $school = School::Where('uuid', $uuid)->first();
        ##
        if($school->status < 2){
            // Mail::to($school->email)->send(new MailableClass);
            session()->flash('status', __('lang.step.1.true'));
            $school->update(['status' => 1]);
            return view('school.register.step1')->with('school', $school);
        }else {
            return redirect()->route('welcome');
        }
    }
    ##
    public function seveDataSchool($school, $request, $imgName, $address)
    {
        return $school->create([
            'uuid' => Str::uuid(),
            'status' => 1, // seting step 1 free true
            'name' => $request['name'],
            'bransh' => $request['bransh'],
            'email' => $request['email'],
            'wep' => $request['wep'],
            'tel' => $request['tel'],
            'fax' => $request['fax'],
            'logo' => $imgName,
            'no' =>NO_school,
            // address_id الربط عنوان المدرسة من جدول العناوين
            'address_id' => $address->id,
            'password' => Password_define,
        ]);
    }
    ##
    public function step3($school_uuid){

        $school = $this->getSchoolAndAddress($school_uuid);
        if ($school->status == 3 ) {
            # code...
            $manager =$school->manager()->first();
            $agent =$school->agent()->first();
            $admins =$school->admins()->first();
            $financial =$school->financial()->first();
            $secretary =$school->secretary()->first();
            $specialist =$school->specialist()->first();
            $card=[
                    'manager'=>$manager,
                    'agent'=>$agent,
                    'admins'=>$admins,
                    'financial'=>$financial,
                    'secretary'=>$secretary,
                    'specialist'=>$specialist,
                    ];
            // return response()->json([$school ,$card]);
            return view('school.register.step3',$card)->with(['school'=>$school]);
        }
    }
    ##
    public function seveAddressSchool($request, $school)
    {
        return  $school->address()->create([
            'country' => $request['country'],
            'cite' =>   $request['cite'],
            'street'=> $request['street'],
            'zip' => $request['zip'] ?? 0,
        ]);
    }
    ###
    public function moveLogoSchool($request)
    {
        if ($request->hasFile('logo')) {
            return $this->saveImage($request['logo'], 'Images/school');
        } else {
            return 'logo-school.png';
        }
    }
    ###
    public function add_Uuid_School_Session($value)
    {
        return (session()->put('School.uuid', $value)) ? true : false;
    }
    ######################################################################
    ###
    public function getSchoolAndAddress($uuid = null)
    {
        $s= School::where('uuid',$uuid)->first();
        return School::with('address')->find($s->id);
    }
    ###
    public function getSchool($uuid = null)
    {
        return School::where('uuid',$uuid)->first();
    }
}
