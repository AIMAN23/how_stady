<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Traits\strTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function addStudentDetails($data =[],Request $request)
    {
        $student=new Student;
        $student->firstOrcreate([
            'id' => $data['id'],
            'uuid' =>strTrait::uuid(),
            'no' => strTrait::timeLowS(),
            'name' => $data['name'],
            'f_name' => $data['f_name'],
            'p_name' => $data['p_name'],
            'l_name' => $data['l_name'],
            'birthdate' => $data['birthdate'],
            'gender' => $data['gender'] ?? '',
            'nationality' => $data['nationality'],
            'email' => $data['email'],
            'address_id' => $data['address_id'] ?? 0,
            'socialdetail_id' => $data['socialdetail_id'] ?? 0,
            'healthdetail_id' => $data['healthdetail_id'] ?? 0,
            'password' => Hash::make($data['password'] ?? '123456789'),
        ]);


    }
}
