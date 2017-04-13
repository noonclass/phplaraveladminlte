<?php

namespace App\Http\Controllers;

use App\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /*
     * Read and Display all data
     */
    public function index()
    {
        $data = Tenant::all();
        return view('tenant')->with('data',$data);
    }

    /*
     * create record
     */
    public function create(Request $request)
    {
        $data = new Tenant;
        $data->name                  = $request->name;
        $data->desc	                 = $request->desc;	
        $data->access_number         = $request->access_number;
        $data->extrinsic_number      = $request->extrinsic_number;
        $data->gateway               = $request->gateway;
        $data->prefix                = $request->prefix;
        $data->holiday               = $request->holiday;
        $data->work_day              = $request->work_day;
        $data->work_hour             = $request->work_hour;
        $data->work_welcome_file     = $request->work_welcome_file;
        $data->non_work_welcome_file = $request->non_work_welcome_file;
        $data->call_rate             = $request->call_rate;
        $data->call_package          = $request->call_package;
        $data->call_package_amount   = $request->call_package_amount;
        $data->call_package_minutes  = $request->call_package_minutes;
        $data->status                = $request->status;
        $data->save();
        //redirect to back page
        //return back()->with('success','Record Added successfully.');
        $data = Tenant::all();
        return response()->json($data);
    }
    
    /*
     * Read data
     */
    public function read(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Tenant::find($id);
            return response()->json($info);
        }
    }

    /*
     * Update data
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $data = Tenant::find($id);
        $data->name                  = $request->name;
        $data->desc	                 = $request->desc;	
        $data->access_number         = $request->access_number;
        $data->extrinsic_number      = $request->extrinsic_number;
        $data->gateway               = $request->gateway;
        $data->prefix                = $request->prefix;
        $data->holiday               = $request->holiday;
        $data->work_day              = $request->work_day;
        $data->work_hour             = $request->work_hour;
        $data->work_welcome_file     = $request->work_welcome_file;
        $data->non_work_welcome_file = $request->non_work_welcome_file;
        $data->call_rate             = $request->call_rate;
        $data->call_package          = $request->call_package;
        $data->call_package_amount   = $request->call_package_amount;
        $data->call_package_minutes  = $request->call_package_minutes;
        $data->status                = $request->status;
        $data->save();
        //redirect to back page
        //return back()->with('success','Record Updated successfully.');
        $data = Tenant::all();
        return response()->json($data);
    }

    /*
     * Delete record
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $data = Tenant::find($id);
        $response = $data->delete();
        if($response)
            echo "Record Deleted successfully.";
        else
            echo "There was a problem. Please try again later.";
    }
}
