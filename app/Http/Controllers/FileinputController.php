<?php

namespace App\Http\Controllers;

use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class FileinputController extends Controller
{
    /*
     * Response of fileinput
     */
    protected $success = null;
    protected $error = "";
    
    /*
     * Upload File
     */
    public function index()
    {
        if (empty($_FILES['upload'])) {
            return json_encode(['error'=>trans('adminlte_lang::message.errormessages.uploadnofilesfound')]);
        }

        $file = $_FILES['upload'];
        $type = empty($_POST['_type']) ? '' : $_POST['_type'];
        
        $dest_path = realpath(public_path('uploads'));
        if(!file_exists($dest_path)){
            mkdir($dest_path, 0755, true);
        }

        $ext = explode('.', basename($file['name']));
        $realname = md5(uniqid()) . "." .    array_pop($ext);
        $target = $dest_path . DIRECTORY_SEPARATOR . $realname;
        
        $this->success = null;
        if(move_uploaded_file($file['tmp_name'], $target)) {
            $this->success = true;
        } else {
            $this->success = false;
        }
        
        if ($type == "utpl"){
            //对于用户模板，做数据有效性检查，模板格式如下: name	fullname	email	password	role */
            Excel::load($target, function($reader) {
                $reader->takeRows(Config::get('constants.default.subsection'));
                $reader->takeColumns(Config::get('constants.tpl.user_column'));
                $reader->each(function($sheet) {
                    $sheet->each(function($row) {
                        if(empty($row->name))return;
                        //用户名校验规则: 只允许包含数字、字母、下划线组成的4到16位字符串
                        if (!preg_match('/^[_0-9a-z]{4,16}$/i', $row->name)){
                            $this->success = false;
                            $this->error = trans('adminlte_lang::message.errormessages.nameinvalid'); 
                        }
                        //邮箱(可选)校验
                        if (!empty($row->email)){
                            if (!preg_match('/([\w\-]+\@[\w\-]+\.[\w\-]+)/i', $row->email)){
                                $this->success = false;
                                $this->error = trans('adminlte_lang::message.errormessages.emailinvalid'); 
                            }
                        }
                        //密码校验规则: 只允许包含数字、字母、下划线组成的6到16位字符串
                        if (!preg_match('/^[_0-9a-z]{6,16}$/i', $row->password)){
                            $this->success = false;
                            $this->error = trans('adminlte_lang::message.errormessages.passwordinvalid'); 
                        }
                    });
                });
            });
        }
        
        if ($this->success === true) {
            $output = ['realname' => $realname];
        } elseif ($this->success === false) {
            unlink($target);
            $output = ['error'=>trans('adminlte_lang::message.errormessages.uploadfault')];
            
            if(!empty($this->error)){
                $output = ['error'=>$this->error];
            }
        } else {
            $output = ['error'=>trans('adminlte_lang::message.errormessages.uploadnofilesproc')];
        }

        return json_encode($output);
    }
}
