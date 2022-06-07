<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function view_users(){
        $role = auth()->user()->role;
        $users = User::get();
        switch ($role) {
            case 'Admin':
                return view('admin.users', [
                    'users' => $users
                ]);
            default:
                return redirect('/dashboard')->with('status', "Not allowed!");
        }
    }

    public function promote_user($id){
        $role = auth()->user()->role;
        // Makes sure only admin can do this
        switch ($role) {
            case 'Admin':
                $selectedUser = User::where('id', $id)->first();
                switch ($selectedUser->role) {
                    case 'User':
                        $promote_to_staff = User::where('id', $id)->update([
                            'role' => "Staff"
                        ]);
                        if($promote_to_staff)
                            return redirect()->back()->with('status', "User promoted to Staff!");
                        else
                            break;
                    case 'Staff':
                        $promote_to_admin = User::where('id', $id)->update([
                            'role' => "Admin"
                        ]);
                        if($promote_to_admin)
                            return redirect()->back()->with('status', "User promoted to Admin!");
                        else
                            break;
                    default:
                        return redirect('/dashboard')->with('status', "Something went wrong!");
                }
            default:
                return redirect('/dashboard')->with('status', "Not allowed!");
        }
    }

    public function demote_user($id){
        $role = auth()->user()->role;
        // Makes sure only admin can do this
        switch ($role) {
            case 'Admin':
                $selectedUser = User::where('id', $id)->first();
                switch ($selectedUser->role) {
                    case 'Staff':
                        $promote_to_staff = User::where('id', $id)->update([
                            'role' => "User"
                        ]);
                        if($promote_to_staff)
                            return redirect()->back()->with('status', "User demoted to User!");
                        else
                            break;
                    case 'Admin':
                        $promote_to_admin = User::where('id', $id)->update([
                            'role' => "Staff"
                        ]);
                        if($promote_to_admin)
                            return redirect()->back()->with('status', "User demoted to Staff!");
                        else
                            break;
                    default:
                        return redirect('/dashboard')->with('status', "Something went wrong!");
                }
            default:
                return redirect('/dashboard')->with('status', "Not allowed!");
        }
    }

    public function delete_users($id){
        $role = auth()->user()->role;
        $delete = User::where('id', $id)->delete();
        switch ($role) {
            case 'Admin':
                if($delete)
                    return redirect()->back()->with('status', "User successfully removed!");
                else
                    break;
            default:
                return redirect('/dashboard')->with('status', "Not allowed!");
        }
    }

    public function view_user($id){
        $role = auth()->user()->role;
        $user = User::where('id', $id)->first();

        switch ($role) {
            case 'Admin':
                return view('admin.user', [
                    'user' => $user
                ]);
            default:
                return redirect('/dashboard')->with('status', "Not allowed!");
        }
    }
}
