<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    public function index(){
        return view('admin.permissions.index',['permissions'=> Permission::all()]);
    }

    public function store(){

        request()->validate([
            'name' => ['required']
        ]);

        Permission::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-')
        ]);

        session()->flash('permission-inserted','Inserted Permission').request('name');

        return back();

    }

    public function edit(Permission $permission){
        return view('admin.permissions.edit' , compact('permission'));
    }

    public function update(Permission $permission){
        $permission->name = Str::ucfirst(request('name'));
        $permission->slug = Str::of(Str::lower(request('name')))->slug('-');

        if ($permission->isDirty('name')){
            $permission->save();
            session()->flash('updated-permission','Updated Permission');
        }else{
            session()->flash('updated-permission','Nothing to Update Permission');
        }

        return redirect(route('admin.permissions'));

    }

    public function destroy(Permission $permission){
       $permission->delete();
       session()->flash('permission-deleted','Deleted Permission');
        return back();
    }
}
