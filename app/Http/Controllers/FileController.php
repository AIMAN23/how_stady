<?php

namespace App\Http\Controllers;

use App\Models\File;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    //
    public function destroy($filename,File $file)
    {
        $f =$file->where('filename',$filename);
        $f->delete();
        $paths = 'public/csv/school/_'.Auth::user()->school->uuid.'/'.$filename;
        Storage::delete($paths);
        
        
        
        $msg= __('lang.btn.Delete') ?? 'تم حذف الملف بنجاح';


        return response($msg);
        
    }
}
