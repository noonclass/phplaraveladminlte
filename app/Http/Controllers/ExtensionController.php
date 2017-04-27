<?php

namespace App\Http\Controllers;

use App\Extension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class ExtensionController extends Controller
{
    /*
     * Read and Display all records
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')){
            $result = DB::table('extensions')->leftJoin('tenants', 'extensions.tenant_id', '=', 'tenants.id')
                        ->select('extensions.*', 'tenants.name as tenant')
                        ->get();
        }elseif (Auth::user()->hasRole('moderator')){
            $tenantID = Auth::user()->tenant_id;
            $result = DB::table('extensions')->leftJoin('tenants', 'extensions.tenant_id', '=', 'tenants.id')
                        ->select('extensions.*', 'tenants.name as tenant')
                        ->where('extensions.tenant_id', $tenantID)
                        ->get();
        }else{
            $id = Auth::user()->id;
            $result = array(0 => DB::table('extensions')->leftJoin('tenants', 'extensions.tenant_id', '=', 'tenants.id')
                        ->leftJoin('users', 'extensions.id', '=', 'users.extension_id')
                        ->select('extensions.*', 'tenants.name as tenant')
                        ->where('users.id', $id)
                        ->first());
        }
        return view('extension')->with('data',$result);
    }

    /*
     * create record
     */
    public function create(Request $request)
    {
        //租户管理员创建分机，分机号的有效性验证
        if (Auth::user()->hasRole('moderator')){
            $tenantID = Auth::user()->tenant_id;
            if($request->number < Config::get('constants.extension.min')+Config::get('constants.default.subsection')*$tenantID ||
               $request->number > Config::get('constants.extension.min')+Config::get('constants.default.subsection')*($tenantID+1)-1){
                return response()->json(['message' => trans('adminlte_lang::message.errormessages.extensionnumberinvalid')], 406);
            }
        }
        
        try{
            $extension = new Extension;
            $extension->number       = $request->number;
            $extension->password	 = bcrypt($request->password);	
            $extension->alias_number = $request->alias_number;
            $extension->tenant_id    = $request->tenant_id;
            $extension->save();
        }catch(\Illuminate\Database\QueryException $e){
            return response()->json(['message' => $e->getMessage()], 406);
        }
        
        $result = DB::table('extensions')->leftJoin('tenants', 'extensions.tenant_id', '=', 'tenants.id')
                    ->select('extensions.*', 'tenants.name as tenant')
                    ->get();
        return response()->json($result);
    }
    
    /*
     * Read record
     */
    public function read(Request $request)
    {
        if($request->ajax()){
            if(isset($request->id)){
                $id = $request->id;
                $result = Extension::find($id);
            }
            else{
                if (Auth::user()->hasRole('admin')){
                    if(isset($request->tenant_id)){
                        $tenant_id = $request->tenant_id;
                        $result = DB::table('extensions')->where('extensions.tenant_id', $tenant_id)->get();
                    }else{
                         $result = Extension::all();
                    }
                }elseif (Auth::user()->hasRole('moderator')){
                    $tenantID = Auth::user()->tenant_id;
                    $result = DB::table('extensions')->where('extensions.tenant_id', $tenantID)->get();
                }
                else{
                    $extensionID = Auth::user()->extension_id;
                    $result = Extension::find($extensionID);
                }
            }
            
            return response()->json($result);
        }
    }

    /*
     * Update record
     */
    public function update(Request $request)
    {
        //租户管理员创建分机，分机号的有效性验证
        if (Auth::user()->hasRole('moderator')){
            $tenantID = Auth::user()->tenant_id;
            if($request->number < Config::get('constants.extension.min')+Config::get('constants.default.subsection')*$tenantID ||
               $request->number > Config::get('constants.extension.min')+Config::get('constants.default.subsection')*($tenantID+1)-1){
                return response()->json(['message' => trans('adminlte_lang::message.errormessages.extensionnumberinvalid')], 406);
            }
        }
        
        $id = $request->id;
        $extension = Extension::find($id);
        $extension->number       = $request->number;
        if(isset($request->password)){
            $extension->password =  bcrypt($request->password);	
        }
        $extension->alias_number = $request->alias_number;
        $extension->tenant_id    = $request->tenant_id;
        $extension->save();
        
        $result = DB::table('extensions')->leftJoin('tenants', 'extensions.tenant_id', '=', 'tenants.id')
                    ->select('extensions.*', 'tenants.name as tenant')
                    ->get();
        return response()->json($result);
    }

    /*
     * Delete record
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $extension = Extension::find($id);
        $result = $extension->delete();
        if($result)
            echo trans('adminlte_lang::message.crudcolumns.succ');
        else
            echo trans('adminlte_lang::message.crudcolumns.fail');
    }
}
