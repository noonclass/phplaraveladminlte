<?php

namespace App\Http\Controllers;

use Excel;
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
        $type = empty($_POST['_type']) ? '' : $_POST['_type'];
        
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
        
        if ($type == "utpl"){
            //对于用户模板，做数据有效性检查，模板格式如下: name	fullname	email	password	extension */
            $reader = Excel::load($target);
            $sheet = $reader->first();//getting the first sheet only
            foreach($sheet as $row){
                //用户名校验规则: 只允许包含数字、字母、下划线组成的4到16位字符串
                if (!preg_match('/^[_0-9a-z]{4,16}$/i', $row->name)){
                    $success = false;
                    $error = "用户名长度4-16位,只允许数字/字母/下划线."; 
                }
                //邮箱(可选)校验
                if (isset($row->email)){
                    if (!preg_match('/([\w\-]+\@[\w\-]+\.[\w\-]+)/i', $row->email)){
                        $success = false;
                        $error = "电子邮件格式不正确."; 
                    }
                }
                //密码校验规则: 只允许包含数字、字母、下划线组成的6到16位字符串
                if (!preg_match('/^[_0-9a-z]{6,16}$/i', $row->password)){
                    $success = false;
                    $error = "密码长度6-16位，只允许数字/字母/下划线."; 
                }
                //分机校验规则: 只允许包含数字的5位字符串
                if (!preg_match('/^[\d]{5}$/i', $row->extension)){
                    $success = false;
                    $error = "分机号格式不正确."; 
                }
            }
        }
        
        if ($success === true) {
            $output = ['realname' => $realname];
        } elseif ($success === false) {
            unlink($target);
            $output = ['error'=>'Error while uploading file. Contact the system administrator.'];
            
            if(isset($error)){
                $output = ['error'=>$error];
            }
        } else {
            $output = ['error'=>'No files were processed.'];
        }

        return json_encode($output);
    }
}
