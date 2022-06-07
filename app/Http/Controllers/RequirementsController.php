<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Requirements;
use App\Models\Notification;

// ? Template for Notification
// Notification::create([
//     'user' => auth()->user()->name,
//     'role' => "Admin",
//     'message' => "New appointment of type " . $request->type . " from User " . auth()->user()->name,
//     'appointment_id' => $init_appointment->id
// ]);
class RequirementsController extends Controller
{
    public function service1(Request $request, $appointment_id){
        $this->validate($request, [
            'type' => 'required',
            'schedule' => 'required',
            'for' => 'required',
            'form' => 'required',
            'sworn_statement' => 'required',
            'auth_letter' => 'required',
            'secretary_cert' => 'required',
            'bldg_permit' => 'required',
            'color_pic_front' => 'required',
            'color_pic_side_1' => 'required',
            'color_pic_side_2' => 'required',
            'sketch_plan' => 'required',
            'tax_declaration' => 'required',
        ]);
    }

    public function service2(Request $request, $appointment_id){
        $this->validate($request, [
            'type' => 'required',
            'schedule' => 'required',
            'for' => 'required',
        ]);
    }

    public function service3(Request $request, $appointment_id){
        $this->validate($request, [
            'type' => 'required',
            'schedule' => 'required',
            'for' => 'required',
        ]);
    }

    public function service4(Request $request, $appointment_id){
        $this->validate($request, [
            'type' => 'required',
            'schedule' => 'required',
            'for' => 'required',
        ]);
    }
    
}