<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Level $level
     * @param string $code
     * @return view('admin.get.input.classroom', $data );
     */
    public function getClassroomsForLevel(Request $request,Level $level){
        $level=$level->where('uuid',$request->code)->first();
        $data=$level->classrooms;
        // return response()->json($level->classrooms);
        // return response()->json($data);
        return view('admin.get.input.Classroom')->with(['data'=>$level->classrooms]);
    }
    //
}
