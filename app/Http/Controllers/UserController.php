<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role; 

class UserController extends Controller
{

    public function getUsers(){
        //!except admin
        $users = User::whereDoesntHave('roles', function ($query) {
        $query->where('name', 'admin');
        })->get();

        return view('admin.Users',compact("users"));
    }


    public function restrictUser($userId)
{
    $user = User::findOrFail($userId);


    $user->roles()->detach();



    return redirect()->back()->with('success', 'User restricted successfully');
}

public function unrestrictUser($userId)
{
    $user = User::findOrFail($userId);

    // You can specify the role you want to reassign
    $roleToReassign = 'organisateur'; // Change this to the desired role

    // Check if the role exists before assigning
    $role = Role::where('name', $roleToReassign)->first();

    if ($role) {
        $user->assignRole($role);
        return redirect()->back()->with('success', 'User role reassigned successfully');
    } else {
        return redirect()->back()->with('error', 'Role not found');
    }
}
}
