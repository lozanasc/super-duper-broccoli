<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notification;

class NotifcationController extends Controller
{

    public function view_notifications_by_role(){
        $role = auth()->user()->role;
        $user_notifications = Notification::where('user', auth()->user()->name)->where('role', auth()->user()->role)->orderBy('updated_at', 'desc')->get();
        $notifications = Notification::where('role', $role)->orderBy('updated_at', 'desc')->get();
        switch ($role) {
            case 'User':
                return view('user.notifications', [
                    'notifications' => $user_notifications
                ]);
            case 'Staff':
                return view('user.notifications', [
                    'notifications' => $notifications
                ]);
            case 'Admin':
                return view('user.notifications', [
                    'notifications' => $notifications
                ]);
            default:
                break;
        }

    }

    public function create_notification(){
        
    }

    public function delete_notification($id){
        $delete_notification = Notification::where('id', $id)->delete();
        if($delete_notification)
            return redirect()->back()->with('status', 'Notification removed!');
        else
            return redirect()->back()->with('status', 'Failed to removed notification!');
    }
}
