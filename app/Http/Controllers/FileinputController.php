<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileinputController extends Controller
{
    /*
     * Upload File
     */
    public function index()
    {
        if (empty($_FILES['upload'])) {
            return json_encode(['error'=>'No files found for upload.']);
        }

        $file = $_FILES['upload'];
        
        $dest_path = realpath(public_path('uploads'));
        if(!file_exists($dest_path)){
            mkdir($dest_path,0755,true);
        }

        $ext = explode('.', basename($file['name']));
        $realname = md5(uniqid()) . "." .    array_pop($ext);
        $target = $dest_path . DIRECTORY_SEPARATOR . $realname;
        
        $success = null;
        if(move_uploaded_file($file['tmp_name'], $target)) {
            $success = true;
        } else {
            $success = false;
        }

        if ($success === true) {
            $output = ['realname' => $realname];
        } elseif ($success === false) {
            unlink($target);
            $output = ['error'=>'Error while uploading file. Contact the system administrator'];
        } else {
            $output = ['error'=>'No files were processed.'];
        }

        return json_encode($output);
    }
}
