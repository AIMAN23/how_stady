<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Supervisor;
use App\Models\SchoolAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // $user =Auth::user();
        // return response()->json($user);
        return view('home');
    }
    public function admin(Request $request)
    {
        $user=Auth::user();
        $admin=SchoolAdmin::where('id',$user->id)->first();
        $school=$admin->school()->first();
        $request->session()->put('school', $school);
        SchoolAdminController::sessput($school->id);


        // $adm=[];
        // $AS=$admin->school()->find($admin->id);
        
        return view('admin.home')->with('school',$school)->with(['tab_pane_3'=>'active']);
    }
    public function supervisor(Request $request)
    {
        $user=Auth::user();
        $supervisor=Supervisor::where('id',$user->id)->first();
        $school=$supervisor->school()->first();
        $request->session()->put('school', $school);
        $request->session()->put('userguard', Auth::user()->guard);
        $request->session()->put('super.levels', $supervisor->level()->get());
        // SchoolAdminController::sessput($school->id);
        


        // $adm=[];
        // $AS=$supervisor->school()->find($supervisor->id);
        
        return view('supervisor.home')->with('school',$school);
    }
    public function manager(Request $request)
    {
        $user=Auth::user();
        // $manager=Manager::where('id',$user->id)->first();
        // $school=$manager->school()->first();
        $request->session()->put('school', $user->school);
        $request->session()->put('levels', $user->school->levels);
        SchoolAdminController::sessput($user->school->id);


        // $adm=[];
        // $AS=$manager->school()->find($manager->id);
        
        return view('manager.home')->with('school',$user->school);
    }
    public function pareent(Request $request)
    {
        $user=Auth::user();
        
        return view('pareent.home');
    }
    public function teacher(Request $request)
    {
        $user=Auth::user();
        
        return view('teacher.home');
    }
    public function student(Request $request)
    {
        $user=Auth::user();
        
        return view('student.home');
    }
    public function secretary(Request $request)
    {
        $user=Auth::user();
        
        return view('secretary.home');
    }
    public function financial(Request $request)
    {
        $user=Auth::user();
        
        return view('financial.home');
    }
    public function specialist(Request $request)
    {
        $user=Auth::user();
        
        return view('specialist.home');
    }
    public function agent(Request $request)
    {
        $user=Auth::user();
        $agent=Agent::where('id',$user->id)->first();
        $school=$agent->school()->first();
        $request->session()->put('school', $school);
        // $request->session()->put('super.levels', $agent->level()->get());
        // SchoolAdminController::sessput($school->id);


        // $adm=[];
        // $AS=$agent->school()->find($agent->id);
        
        return view('agent.home')->with('school',$school);
    }

    public function getSchoolForAdmin($admin_id){
        $admin=SchoolAdmin::find($admin_id);
        return response()->json([
            'school'=>$admin->school()->first()
        ]);
    }
    public function getOptionCountry(){
        return view('includes\country_'.app()->getLocale());
    }
}
