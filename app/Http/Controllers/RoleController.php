<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ultraware\Roles\Models\Role;

class RoleController extends Controller
{
    /*
     * Read and Display all records
     */
    public function index()
    {
        $result = Role::all();
        return view('role')->with('data',$result);
    }

    /*
     * create record
     * by default have three roles: user, moderator and admin. User has a level 1, moderator level 2 and admin level 3. 
     */
    public function create(Request $request)
    {
        $adminRole = Role::create([
            'name'        => $request->name,
            'slug'        => $request->slug,
            'description' => $request->desc,  // optional
            'level'       => $request->level, // optional, set to 1 by default
        ]);
        
        $result = Role::all();
        return response()->json($result);
    }
    
    /*
     * Read record
     */
    public function read(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $result = Role::find($id);
            return response()->json($result);
        }
    }

    /*
     * Update record
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $role = Role::find($id);
        $role->name        = $request->name;
        $role->slug	       = $request->slug;	
        $role->description = $request->desc;
        $role->level       = $request->level;
        $role->save();
        
        $result = Role::all();
        return response()->json($result);
    }

    /*
     * Delete record
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $role = Role::find($id);
        $result = $role->delete();
        if($result)
            echo trans('adminlte_lang::message.crudcolumns.succ');
        else
            echo trans('adminlte_lang::message.crudcolumns.fail');
    }
}
