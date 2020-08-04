<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Support\Str;
use App\Permission;

class RoleController extends Controller
{
    public function index(){
        $roles=Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    public function store(){
     
        request()->validate(['name'=>'required']);


        $role=Role::where('name', request('name'))->get();
         
        if(!$role->isEmpty()){
            session()->flash('role-failed','Inserted Duplicate Role!');
        }else{
            Role::Create([
                'name' => Str::ucfirst(request('name')),
                'slug' => Str::of(Str::lower(request('name')))->slug('-')
            ]);
    
            session()->flash('role-inserted','Inserted Role!');
        }
        
        return back();

    }

    public function edit(Role $role){
         $permissions= Permission::all();
         return view('admin.roles.edit', compact('role','permissions'));
    } 

    public function update(Role $role){

        $role->name=Str::ucfirst(request('name'));
        $role->slug=Str::of(request('name'))->slug('-');

        if ($role->isDirty('name')){
            session()->flash('role-updated','Updated Role:'. $role->name);
            $role->save();
        } else {
            session()->flash('role-updated','Nothing to Update Role:'. $role->name);
        }


        return redirect(route('admin.roles'));
    }

    public function destory(Role $role){
        $role->delete();

        session()->flash('role-deleted','Deleted Role:'.$role->name);

        return back();
    }

    public function attach(Role $role){
        $role->permissions()->attach(request('permission'));
        return back();
    }

    public function detach(Role $role){
        $role->permissions()->detach(request('permission'));
        return back();
    }

}
