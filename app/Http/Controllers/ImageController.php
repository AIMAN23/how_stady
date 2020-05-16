<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    ########## عملية حفظ الصورة 
    public function formSubmit(Request $request)
    {

    	$imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

    	return response()->json(['success'=>'You have successfully upload image.']);
    }
}