<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function send_feedback(Request $request){
        $this->validate($request, [
            'message' => 'required',
        ]);

        $send = Feedback::create([
            'user' => auth()->user()->name,
            'message' => $request->message
        ]);

        if($send)
            return redirect()->back()->with('status', 'We appreciate your honest feedback!');
        else
            return redirect()->back()->with('status', 'Something went wrong!');
    }

    public function delete_feedback($id){
        $role = auth()->user()->role;

        $delete = Feedback::where('id', $id)->delete();

        switch ($role) {
            case 'Admin':
                if($delete)
                    return redirect()->back()->with('status', "Feedback removed!");
                else
                    break;
            case 'Staff':
                if($delete)
                    return redirect()->back()->with('status', "Feedback removed!");
                else
                    break;
            default:
                return redirect('/dashboard')->with('status', "Not allowed!");
        }
    }

    public function view_feedback(){
        $role = auth()->user()->role;
        $feedbacks = Feedback::get();
        switch ($role) {
            case 'Admin':
                return view('admin.feedback', [
                    'feedbacks' => $feedbacks
                ]);
            case 'Staff':
                return view('staff.feedback', [
                    'feedbacks' => $feedbacks
                ]);
            default:
                return redirect('/dashboard')->with('status', "Not allowed!");
        }
    }
}
