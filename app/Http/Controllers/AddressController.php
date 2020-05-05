<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Address;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //
    public function AddressSchool(Request $r)
    {
        // return $r;
        // $data = $r->session()->all();
        // return response()->json($data);
        // return App\Models\Address::
            //  $random = new Uuid;
            //  $random=Uuid::uuid();
            // return $random ;
            // return School::find('1')->address;
            // return Address::find('1')->school;
            $address= Address::with('school')->find('1');
            return response()->json($address);
    }
}
