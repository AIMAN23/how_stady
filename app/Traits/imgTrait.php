<?php

namespace App\Traits;

Trait  imgTrait
{
     function saveImage($photo,$folder){
        //save photo in folder
        $file_extension = $photo -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folder;
        $photo -> move($path,$file_name);

        return $file_name;
    }
    function insertMessage(){
        $name = isset($_POST['name']) ? $_POST['name'] : 'Anonymous';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $submitDate = date($this->dateFormat);
        $content = isset($_POST['message']) ? $_POST['message'] : '';
       
        if (trim($name) == '') $name = 'Anonymous';//if empty ,write anonymous
        if (strlen($content)<5) {
        exit();
        }
       
       $filename=date('YmdHis');
        if (!file_exists($this->messageDir)){ //checks file or directory not or present isلو الد مش موجود
        mkdir($this->messageDir);//make adirectory called messages
        }
        $f = fopen($this->messageDir.DIRECTORY_SEPARATOR.$filename.".txt","w+");//w+read+write
        fwrite($f,$name."\n");//write in the file
        fwrite($f,$email."\n");
        fwrite($f,$submitDate."\n");
        fwrite($f,$content."\n");
        fclose($f);
       
       }


}
