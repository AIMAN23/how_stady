<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth:admin');
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
    public function home(Request $request)
    {
        $user=Auth::user();
        $admin=SchoolAdmin::wehere('id',$user->id)->first();
        $school=$admin->school()->first();
        $request->session()->put('school', $school);
        SchoolAdminController::sessput($school->id);


        // $adm=[];
        // $AS=$admin->school()->find($admin->id);
        
        return view('admin.home')->with('school',$school);
    }

    public function getSchoolForAdmin($admin_id){
        $admin=SchoolAdmin::find($admin_id);
        return response()->json([
            'school'=>$admin->school()->first()
        ]);
    }
}
