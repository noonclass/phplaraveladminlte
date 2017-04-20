<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Ultraware\Roles\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /*
     * Read and Display all records
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')){
            $result = DB::table('users')->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
                    ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
                    ->leftJoin('extensions', 'users.extension_id', '=', 'extensions.id')
                    ->leftJoin('tenants', 'users.tenant_id', '=', 'tenants.id')
                    ->select('users.*', 'roles.description as role', 'extensions.number as extension', 'tenants.name as tenant')
                    ->get();
        }elseif (Auth::user()->hasRole('moderator')){
            $tenantID = Auth::user()->tenant_id;
            $result = DB::table('users')->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
                    ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
                    ->leftJoin('extensions', 'users.extension_id', '=', 'extensions.id')
                    ->leftJoin('tenants', 'users.tenant_id', '=', 'tenants.id')
                    ->select('users.*', 'roles.description as role', 'extensions.number as extension', 'tenants.name as tenant')
                    ->where('users.tenant_id', $tenantID)
                    ->get();
        }else{
            $id = Auth::user()->id;
            $result = array(0 => DB::table('users')->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
                    ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
                    ->leftJoin('extensions', 'users.extension_id', '=', 'extensions.id')
                    ->leftJoin('tenants', 'users.tenant_id', '=', 'tenants.id')
                    ->select('users.*', 'roles.description as role', 'extensions.number as extension', 'tenants.name as tenant')
                    ->where('users.id', $id)
                    ->first());
        }
        return view('user')->with('data',$result);
    }

    /*
     * create record
     */
    public function create(Request $request)
    {
        try{
            $user = new User;
            $user->name          = $request->name;
            $user->fullname	     = $request->fullname;	
            $user->email         = $request->email;
            $user->password      = bcrypt($request->password);
            $user->extension_id  = $request->extension_id;
            $user->tenant_id     = $request->tenant_id;
            $user->status        = $request->status;
            $user->save();
        }catch(\Illuminate\Database\QueryException $e){
            return response()->json(['message' => $e->getMessage()], 406);
        }
            
        //attaching roles
        $user->attachRole($request->role_id);
        
        $result = DB::table('users')->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
                ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
                ->leftJoin('extensions', 'users.extension_id', '=', 'extensions.id')
                ->leftJoin('tenants', 'users.tenant_id', '=', 'tenants.id')
                ->select('users.*', 'roles.description as role', 'extensions.number as extension', 'tenants.name as tenant')
                ->get();
        return response()->json($result);
        
    }
    
    /*
     * Read record
     */
    public function read(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $result = DB::table('users')->where('users.id', $id)
                    ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
                    ->select('users.*', 'role_user.role_id')
                    ->first();
            return response()->json($result);
        }
    }

    /*
     * Update record
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user->name          = $request->name;
        $user->fullname	     = $request->fullname;	
        $user->email         = $request->email;
        if(isset($request->password)){
            $user->password  = bcrypt($request->password);
        }
        $user->extension_id  = $request->extension_id;
        $user->tenant_id     = $request->tenant_id;
        $user->status        = $request->status;
        $user->save();
        
        //updating roles
        $user->detachAllRoles();
        $user->attachRole($request->role_id);
        
        $result = DB::table('users')->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
                ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
                ->leftJoin('extensions', 'users.extension_id', '=', 'extensions.id')
                ->leftJoin('tenants', 'users.tenant_id', '=', 'tenants.id')
                ->select('users.*', 'roles.description as role', 'extensions.number as extension', 'tenants.name as tenant')
                ->get();
        return response()->json($result);
    }

    /*
     * Delete record
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        //detaching all roles
        $user->detachAllRoles();
        $result = $user->delete();
        if($result)
            echo trans('adminlte_lang::message.crudcolumns.succ');
        else
            echo trans('adminlte_lang::message.crudcolumns.fail');
    }
}
