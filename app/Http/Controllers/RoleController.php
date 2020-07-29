<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index(){
        $roles=Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    public function store(){
       
    }
}
