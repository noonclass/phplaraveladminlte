<?php

namespace App\Http\Controllers;

use App\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{
    /*
     * Read and Display all records
     */
    public function index()
    {
        $result = Tenant::all();
        return view('tenant')->with('data',$result);
    }

    /*
     * Create record
     */
    public function create(Request $request)
    {
        try{
            $tenant = new Tenant;
            $tenant->name                 = $request->name;
            $tenant->desc	              = $request->desc;	
            $tenant->access_number        = $request->access_number;
            $tenant->extrinsic_number     = $request->extrinsic_number;
            $tenant->gateway              = $request->gateway;
            $tenant->prefix               = $request->prefix;
            $tenant->welcome_file         = $request->welcome_file;
            $tenant->nonwork_file         = $request->nonwork_file;
            $tenant->moh_file             = $request->moh_file;
            $tenant->blacklist_on         = $request->blacklist_on;
            $tenant->whitelist_on         = $request->whitelist_on;
            $tenant->call_rate            = $request->call_rate;
            $tenant->call_package         = $request->call_package;
            $tenant->call_package_amount  = $request->call_package_amount;
            $tenant->call_package_minutes = $request->call_package_minutes;
            $tenant->status               = $request->status;
            $tenant->save();
        }catch(\Illuminate\Database\QueryException $e){
            return response()->json(['message' => $e->getMessage()], 406);
        }
        
        $result = Tenant::all();
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
                $result = Tenant::find($id);
            }else{
                $result = Tenant::all();
            }
            
            return response()->json($result);
        }
    }

    /*
     * Update record
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $tenant = Tenant::find($id);
        $tenant->name                 = $request->name;
        $tenant->desc	              = $request->desc;	
        $tenant->access_number        = $request->access_number;
        $tenant->extrinsic_number     = $request->extrinsic_number;
        $tenant->gateway              = $request->gateway;
        $tenant->prefix               = $request->prefix;
        $tenant->welcome_file         = $request->welcome_file;
        $tenant->nonwork_file         = $request->nonwork_file;
        $tenant->moh_file             = $request->moh_file;
        $tenant->blacklist_on         = $request->blacklist_on;
        $tenant->whitelist_on         = $request->whitelist_on;
        $tenant->call_rate            = $request->call_rate;
        $tenant->call_package         = $request->call_package;
        $tenant->call_package_amount  = $request->call_package_amount;
        $tenant->call_package_minutes = $request->call_package_minutes;
        $tenant->status               = $request->status;
        $tenant->save();
        
        $result = Tenant::all();
        return response()->json($result);
    }

    /*
     * Delete record
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $tenant = Tenant::find($id);
        $result = $tenant->delete();
        if($result)
            echo trans('adminlte_lang::message.crudcolumns.succ');
        else
            echo trans('adminlte_lang::message.crudcolumns.fail');
    }
}
