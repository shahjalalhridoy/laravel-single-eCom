<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades;
use RealRashid\SweetAlert\Facades\Alert;

class UserManagementController extends Controller
{
    public function AllUserList(){
       // $users = User::latest()->get();

        $users = User::select(
            "users.*",
            "role_user.role_id",
            "role_user.user_id",
            "roles.display_name AS role_name",
        )
            ->join("role_user", "role_user.user_id", "=", "users.id")
            ->join("roles", "roles.id", "=", "role_user.role_id")
            ->get();

        return view('admin.alluser', compact('users'));
    }

    public function UserStatusActive(Request $request){
        $user_id = $request->user_id;      
        
        User::findOrFail($user_id)->update([
            'user_status' => 'Deactive',

        ]);

        return redirect()->route('alluserlist')->with('message', 'User Status Updated Successfully!');
    }


    public function UserStatusDeactive(Request $request){
        $user_id = $request->user_id;      
        
        User::findOrFail($user_id)->update([
            'user_status' => 'Active',

        ]);
        return redirect()->route('alluserlist')->with('message', 'User Status Updated Successfully!');

    }


    
}
