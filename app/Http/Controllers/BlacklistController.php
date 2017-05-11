<?php

namespace App\Http\Controllers;

use App\User;
use App\Tenantmeta;
use App\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ultraware\Roles\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class 	BlacklistController extends Controller
{
    /*
     * Read and Display all records
     */
    public function index()
    {
         $blacklist_number='blacklist_number';
        if (Auth::user()->hasRole('admin')){
            //$result = Tenantmeta::all();             
            $result = DB::table('tenantmeta')->where('tenantmeta.meta_key',$blacklist_number)
                    ->leftJoin('tenants', 'tenantmeta.tenant_id', '=', 'tenants.id')
                    ->select('tenantmeta.*','tenants.name')
                    ->get();
        }elseif(Auth::user()->hasRole('moderator')){
            $tenant_id = Auth::user()->tenant_id;
            $result = DB::table('tenantmeta')->where('tenantmeta.tenant_id', $tenant_id)->where('tenantmeta.meta_key',$blacklist_number)
                    ->leftJoin('tenants', 'tenantmeta.tenant_id', '=', 'tenants.id')
                    ->select('tenantmeta.*','tenants.name')
                    ->get();
		}
        else{}
        return view('blacklist')->with('data',$result);
    }

    /*
     * create record
     *. 
     */
    public function create(Request $request)
    {    
          try{
            $tenantmeta = new Tenantmeta;
            $tenantmeta->meta_key             = $request->meta_key;
            $tenantmeta->meta_value	      = $request->meta_value;	
            $tenantmeta->tenant_id	      = $request->tenantId;	
            $tenantmeta->save();
        }catch(\Illuminate\Database\QueryException $e){
            return response()->json(['message' => $e->getMessage()], 406);// 406: Not Acceptable
        }
        
        $result = Tenantmeta::all();
        return response()->json($result);
    }
    
    /*
     * Read record
     */
    public function read(Request $request)
    {
            if($request->ajax()){
		//$meta_id = $request->meta_id;
            //$result = Tenantmeta::find($meta_id);
            $meta_id = $request->meta_id;
            $result = DB::table('tenantmeta')->where('tenantmeta.meta_id', $meta_id)
                    ->select('tenantmeta.*')
                    ->first();
            return response()->json($result);
        }
    }

    /*
     * Update record
     */
    public function update(Request $request)
    {
        $meta_id = $request->meta_id;
        $tenantmeta =DB::table('tenantmeta')->where('tenantmeta.meta_id', $meta_id)
                    ->select('tenantmeta.*');	
        $tenantmeta= DB::table('tenantmeta')->where('tenantmeta.meta_id', $meta_id)->update(array('meta_key' => $request->meta_key, 'meta_value' => $request->meta_value,'updated_at' => \Carbon\Carbon::now()));
        if (Auth::user()->hasRole('admin')){
            //$result = Tenantmeta::all();   
            $result = DB::table('tenantmeta')
                    ->leftJoin('tenants', 'tenantmeta.tenant_id', '=', 'tenants.id')
                    ->select('tenantmeta.*','tenants.name')
                    ->get();
        }elseif(Auth::user()->hasRole('moderator')){
            $tenant_id = Auth::user()->tenant_id;
            $result = DB::table('tenantmeta')->where('tenantmeta.tenant_id', $tenant_id)
                    ->leftJoin('tenants', 'tenantmeta.tenant_id', '=', 'tenants.id')
                    ->select('tenantmeta.*','tenants.name')
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
        $meta_id = $request->meta_id;
        $result = DB::table('tenantmeta')->where('tenantmeta.meta_id', $meta_id)
                ->delete();
        if($result)
            echo trans('adminlte_lang::message.crudcolumns.succ');
        else
            echo trans('adminlte_lang::message.crudcolumns.fail');
    }
    
    public function change_select(Request $request)
    {
        $blacklist_number='blacklist_number';
        $tenantId = $request->tenantId;
        if (Auth::user()->hasRole('admin')){
            //$result = Tenantmeta::all();   
            $result = DB::table('tenantmeta')->where('tenantmeta.tenant_id',$tenantId)->where('tenantmeta.meta_key',$blacklist_number)
                    ->leftJoin('tenants', 'tenantmeta.tenant_id', '=', 'tenants.id')
                    ->select('tenantmeta.*','tenants.name')
                    ->get();
        }elseif(Auth::user()->hasRole('moderator')){
            $tenant_id = Auth::user()->tenant_id;
            $result = DB::table('tenantmeta')->where('tenantmeta.tenant_id', $tenant_id)->where('tenantmeta.meta_key',$blacklist_number)
                    ->leftJoin('tenants', 'tenantmeta.tenant_id', '=', 'tenants.id')
                    ->select('tenantmeta.*','tenants.name')
                    ->get();
		}
        else{}
        return response()->json($result);
    }
}
