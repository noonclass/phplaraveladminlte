<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class 	OutsideController extends Controller
{
    /*
     * Read and Display all records
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')){
            //$result = Tenantmeta::all();             
            $result = DB::table('extensions')->where('users.outdial_on','1')
                    ->leftJoin('users', 'extensions.id', '=', 'users.extension_id')
                    ->leftJoin('tenants', 'users.tenant_id', '=', 'tenants.id')
                    ->distinct()
                    ->select('extensions.*', 'tenants.name as tenant')
                    ->get();
        }elseif(Auth::user()->hasRole('moderator')){
            $tenant_id = Auth::user()->tenant_id;
            $result = DB::table('extensions')->where('tenants.id', $tenant_id)->where('users.outdial_on','1')
                    ->leftJoin('users', 'extensions.id', '=', 'users.extension_id')
                    ->leftJoin('tenants', 'users.tenant_id', '=', 'tenants.id')
                    ->distinct()
                    ->select('extensions.*','tenants.name as tenant')
                    ->get();
		}
        else{}
        return view('outside')->with('data',$result);
    }

   /*
     * create record
     */
    public function create(Request $request)
    {
        $number = $request->number;
        $extension= DB::table('users')
                ->where('extensions.number', $number)
                ->leftJoin('extensions', 'extensions.id', '=', 'users.extension_id')
                ->update(array('outdial_on' => '1','users.updated_at' => \Carbon\Carbon::now()));
        
        if (Auth::user()->hasRole('admin')){
            //$result = Tenantmeta::all();             
            $result = DB::table('extensions')->where('users.outdial_on','1')
                    ->leftJoin('users', 'extensions.id', '=', 'users.extension_id')
                    ->leftJoin('tenants', 'users.tenant_id', '=', 'tenants.id')
                    ->distinct()
                    ->select('extensions.*', 'tenants.name as tenant')
                    ->get();
        }elseif(Auth::user()->hasRole('moderator')){
            $tenant_id = Auth::user()->tenant_id;
            $result = DB::table('extensions')->where('tenants.id', $tenant_id)->where('users.outdial_on','1')
                    ->leftJoin('users', 'extensions.id', '=', 'users.extension_id')
                    ->leftJoin('tenants', 'users.tenant_id', '=', 'tenants.id')
                    ->distinct()
                    ->select('extensions.*','tenants.name as tenant')
                    ->get();
		}
        else{}
        return response()->json($result);
    }
    
    /*
     * Delete record
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $result= DB::table('users')->where('users.extension_id', $id)->update(array('outdial_on' => '0','updated_at' => \Carbon\Carbon::now()));
        if($result)
            echo trans('adminlte_lang::message.crudcolumns.succ');
        else
            echo trans('adminlte_lang::message.crudcolumns.fail');
    }
    
     public function read_extision(Request $request)
    {
        if (Auth::user()->hasRole('admin')){            
                $result =DB::table('extensions') ->where('users.outdial_on','0')
                    ->leftJoin('users', 'extensions.id', '=', 'users.extension_id')
                    ->leftJoin('tenants', 'users.tenant_id', '=', 'tenants.id')
                    ->distinct()
                    ->select('extensions.*', 'tenants.name as tenant')
                    ->get();
        }
        elseif (Auth::user()->hasRole('moderator')){
                    $tenantID = Auth::user()->tenant_id;
                    $result = DB::table('extensions')->where('tenants.id', $tenantID)->where('users.outdial_on','0')
                    ->leftJoin('users', 'extensions.id', '=', 'users.extension_id')
                    ->leftJoin('tenants', 'users.tenant_id', '=', 'tenants.id')
                    ->distinct()
                    ->select('extensions.*','tenants.name as tenant')
                    ->get();
        }              
        return response()->json($result);
    }
}
