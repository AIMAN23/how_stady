<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    //
    public function AddressSchool(Request $r)
    {
        // return $r;
        $data = $r->session()->all();
        return response()->json($data);
    }
}
