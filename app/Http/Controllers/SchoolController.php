<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    //
    public function SchoolAddress(Request $r)
    {
        // return $r;
        // $r->session()->flash('name' , 'aiman');
        // $data = $r->session()->all();
        // return response()->json($data);
        $school= School::with('address')->find('1');
            return response()->json($school);
    }
}
