<?php

namespace App\Http\Controllers;

use App\Extension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExtensionController extends Controller
{
    /*
     * Read and Display all records
     */
    public function index()
    {
        $result = DB::table('extensions')->leftJoin('tenants', 'extensions.tenant_id', '=', 'tenants.id')
                    ->select('extensions.*', 'tenants.name as tenant')
                    ->get();
        return view('extension')->with('data',$result);
    }

    /*
     * create record
     */
    public function create(Request $request)
    {
        try{
            $extension = new Extension;
            $extension->number       = $request->number;
            $extension->password	 =  bcrypt($request->password);	
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
            else if(isset($request->tenant_id)){
                $tenant_id = $request->tenant_id;
                $result = DB::table('extensions')->where('extensions.tenant_id', $tenant_id)->get();
            }else{
                 $result = Extension::all();
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
