<?php

namespace App\Http\Controllers;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\strTrait as strT;
use Illuminate\Support\Facades\Storage;

// use Symfony\Component\Translation\Loader\CsvFileLoader;

class ImageController extends Controller
{
    
    use strT;
    ########## عملية حفظ الصورة 
    public function formSubmit(Request $request)
    {
        /**
         * // $imageName = time().'.'.$request->image->getClientOriginalName();
         * // $request->image->move(public_path('storage\images'), $imageName);
         */
         
    	$imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

    	return response()->json(['success'=>'You have successfully upload image.']);
    }


   
    public function readingFile($filenames = 'files\Book3.csv')
    {
        // return response()->download($filenames);
        // $code=[];
        // $this->uuid()->Version()=1;
        
        $Str=new Str;
        $codes=[];
        
        // $d=new DateTime;
        for ($i=0; $i <1000 ; $i++) { 
            $codes[]=$this->no();
        }
        
        return $codes ;
    }

    /**
     * قرائة ملف اكسل وتحويلة الى مصفوفة ليتم اظافتها في قاعدة البيانات
     * تستقبل اربع متغيرات
     * 1- اسم الملف
     * 2- نوع الفاصل بين كل عمود
     * 3- حجم الملف
     * 4- اسماء الاعمدة 
     * 
     *  هاذة العملية ترجع الملف بشكل مصفوفة
     * 
     */
    public static function csvToArray($filename = '', $delimiter = ',', $longest, $keys=[])
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            return false;
        }
        
        $header=null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while ($row = fgetcsv($handle, $longest, $delimiter)) {
                if (!$header) {
                    $header = $keys;
                } else {
                    $data[] = array_combine($header , $row);
                }
            }
            fclose($handle);
        }

        return $data;
    }

    ///////////////////////////////////////////////////////////////

    // public static function f_parse_csv($file, $longest, $delimiter)
    // {
    //     // $header=['a','b','j','u','y','h','vv'];
    //     // $mdarray = array();
    //     // $file    = fopen($file, "r");
    //     // while ($line = fgetcsv($file, $longest, $delimiter)) {
    //     //     // array_push($mdarray, $line);
    //     //     $mdarray[]=array_combine($header , $line);
    //     // }
    //     // fclose($file);
    //     // return $mdarray;
    // }


}