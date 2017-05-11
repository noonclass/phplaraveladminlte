<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class 	SchedhangupController extends Controller
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
                    ->select('extensions.*', 'tenants.name as tenant','users.outdial_sched as outdial_sched')
                    ->get();
        }elseif(Auth::user()->hasRole('moderator')){
            $tenant_id = Auth::user()->tenant_id;
            $result = DB::table('extensions')->where('tenants.id', $tenant_id)->where('users.outdial_on','1')
                    ->leftJoin('users', 'extensions.id', '=', 'users.extension_id')
                    ->leftJoin('tenants', 'users.tenant_id', '=', 'tenants.id')
                    ->distinct()
                    ->select('extensions.*','tenants.name as tenant','users.outdial_sched as outdial_sched')
                    ->get();
		}
        else{}
        return view('schedhangup')->with('data',$result);
    }

    /*
     * Read record
     */
    public function read(Request $request)
    {
        if(isset($request->id)){
            $id = $request->id;
            $result =  DB::table('extensions')->where('extensions.id',$id)
                    ->leftJoin('users', 'extensions.id', '=', 'users.extension_id')
                    ->distinct()
                    ->select('extensions.*','users.outdial_sched as outdial_sched')
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
        $extension= DB::table('users')->where('users.extension_id', $id)->update(array('outdial_sched' => $request->outdial_sched,'updated_at' => \Carbon\Carbon::now()));
        if (Auth::user()->hasRole('admin')){
            //$result = Tenantmeta::all();             
            $result = DB::table('extensions')->where('users.outdial_on','1')
                    ->leftJoin('users', 'extensions.id', '=', 'users.extension_id')
                    ->leftJoin('tenants', 'users.tenant_id', '=', 'tenants.id')
                    ->distinct()
                    ->select('extensions.*', 'tenants.name as tenant','users.outdial_sched as outdial_sched')
                    ->get();
        }elseif(Auth::user()->hasRole('moderator')){
            $tenant_id = Auth::user()->tenant_id;
            $result = DB::table('extensions')->where('tenants.id', $tenant_id)->where('users.outdial_on','1')
                    ->leftJoin('users', 'extensions.id', '=', 'users.extension_id')
                    ->leftJoin('tenants', 'users.tenant_id', '=', 'tenants.id')
                    ->distinct()
                    ->select('extensions.*','tenants.name as tenant','users.outdial_sched as outdial_sched')
                    ->get();
	}
        return response()->json($result);
    }
}
