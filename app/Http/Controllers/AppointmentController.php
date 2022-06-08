<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Notification;
use \Carbon\Carbon;

class AppointmentController extends Controller
{
    public function new_appointment(Request $request){
        
        if(auth()->user()->role !== "User")
            return redirect('/dashboard')->with('status', 'Not allowed!');

        $this->validate($request, [
            'type' => 'required',
            'schedule' => 'required',
        ]);
        $allAppointments = Appointment::where('user', auth()->user()->name)->get();
        $appointmentCount = count($allAppointments);

        if($appointmentCount >= 1){
            return redirect()->back()->with('status', 'Exceeded amount of appointment set per day!');
        } else {
            $init_appointment = Appointment::create([
                'user' => auth()->user()->name,
                'type' => $request->type,
                'schedule' => $request->schedule,
                'status' => "Pending",
                'complete' => "Incomplete",
                'notes' => ""
            ]);
            if($init_appointment){
                Notification::create([
                    'user' => auth()->user()->name,
                    'role' => "Admin",
                    'message' => "New appointment of type " . $request->type . " from User " . auth()->user()->name,
                    'appointment_id' => $init_appointment->id
                ]);
                return redirect()->back()->with('status', 'Appointment successfully set!');
            }
            else
                return redirect()->back()->with('status', 'Appointment set has failed!');
        }
    }

    public function cancel_appointment($id){

        $role = auth()->user()->role;

        $cancelled_appoinment = Appointment::where('id', $id)->first();
        
        $cancel_appoinment = Appointment::where('id', $id)->delete();
        
        switch ($role) {
            case 'User':
                if($cancel_appoinment){
                    Notification::create([
                        'user' => auth()->user()->name,
                        'role' => "Admin",
                        'message' => "Cancelled appointment of type " . $cancelled_appoinment->type . " from User " . auth()->user()->name,
                        'appointment_id' => $cancelled_appoinment->id
                    ]);
                    Notification::create([
                        'user' => auth()->user()->name,
                        'role' => "Staff",
                        'message' => "Cancelled appointment of type " . $cancelled_appoinment->type . " from User " . auth()->user()->name,
                        'appointment_id' => $cancelled_appoinment->id
                    ]);
                    return redirect()->back()->with('status', 'Appointment successfully cancelled!');
                }
                    else
                        return redirect()->back()->with('status', 'Appointment cancellation has failed!');
            case 'Admin':
                if($cancel_appoinment){
                    Notification::create([
                        'user' => auth()->user()->name,
                        'role' => "User",
                        'message' => "Your appointment " . $cancelled_appoinment->type . " has been rejected ",
                        'appointment_id' => $cancelled_appoinment->id
                    ]);
                    return redirect('appointments')->with('status', 'Appointment successfully cancelled!');
                }
                    else
                        return redirect('appointments')->with('status', 'Appointment cancellation has failed!');
            case 'Staff':
                if($cancel_appoinment){
                    Notification::create([
                        'user' => auth()->user()->name,
                        'role' => "User",
                        'message' => "Your appointment " . $cancelled_appoinment->type . " has been rejected ",
                        'appointment_id' => $cancelled_appoinment->id
                    ]);
                    return redirect('appointments')->with('status', 'Appointment successfully cancelled!');
                }
                    else
                    return redirect('appointments')->with('status', 'Appointment cancellation has failed!');
            default:
                return redirect('appointments')->with('status', 'Appointment cancellation has failed!');
        }

        
    }


    public function accept_appointment($id){
        $currAppointment = Appointment::where('id', $id)
                ->first();
        $update = Appointment::where('id', $id)
                ->update([
                    'status' => "Accepted",
                ]);
        if($update){
            Notification::create([
                'user' => $currAppointment->user,
                'role' => "User",
                'message' => "Your appointment has been accepted for service " . $currAppointment->type . " check your appointments to see requirements",
                'appointment_id' => $id
            ]);
            return redirect()->back()->with('status', 'Appointment accepted!');
        }
        else
            return redirect()->back()->with('status', 'Appointment acceptance failed!');
    }

    public function generate_appointment_receipt($id){
        $currAppointment = Appointment::where('id', $id)
                ->first();
        if($currAppointment->status === "Approved"){
            return view('user.generated', [
                'appointment' => $currAppointment
            ]);
        } else 
            return redirect()->back()->with('status', 'Appointment not approved!');
    }

    public function approve_appointment($id){
        $currAppointment = Appointment::where('id', $id)
                ->first();
        $update = Appointment::where('id', $id)
                ->update([
                    'status' => "Approved",
                ]);
        if($update){
            Notification::create([
                'user' => auth()->user()->name,
                'role' => "User",
                'message' => "Your appointment has been approved for service " . $currAppointment->type . "check your appointments to print receipt!",
                'appointment_id' => $id
            ]);
            return redirect()->back()->with('status', 'Appointment approved!');
        }
        else
            return redirect()->back()->with('status', 'Appointment approval failed!');
    }

    public function view_appointments(){
        $role = auth()->user()->role;

        switch ($role) {
            case 'User': 
                $userAppointments = Appointment::where('user', auth()->user()->name)->get();
                return view('user.appointments', [
                    'appointment' => $userAppointments
                ]);
            case 'Admin':
                $allAppointments = Appointment::get();
                return view('admin.appointments', [
                    'appointment' => $allAppointments
                ]);
            case 'Staff':
                $allAppointments = Appointment::get();
                return view('staff.appointments', [
                    'appointment' => $allAppointments
                ]);
            default:
                return redirect('/')->with('status', 'Not allowed!');
        }
    }

    public function view_appointment($id){
        $role = auth()->user()->role;
        $appointment = Appointment::where('id', $id)->first();
        switch ($role) {
            case 'User':
                if(!$appointment)
                    return redirect()->back()->with('status', 'Appointment not found!');
                else
                    return view('user.edit', [ 'appointment' => $appointment ]);
            case 'Admin':
                if(!$appointment)
                    return redirect()->back()->with('status', 'Appointment not found!');
                else
                    return view('admin.view', [ 'appointment' => $appointment ]);
            case 'Staff':
                if(!$appointment)
                    return redirect()->back()->with('status', 'Appointment not found!');
                else
                    return view('staff.view', [ 'appointment' => $appointment ]);
            default:
                return redirect('/')->with('status', 'Not allowed!');
        }
    }
    public function update_appointment(Request $request, $id){
        $this->validate($request, [
            'type' => 'required',
            'schedule' => 'required',
        ]);
        
        $update = Appointment::where('id', $id)
                ->update([
                    'type' => $request->type,
                    'schedule' => $request->schedule
                ]);
        
        if($update){
            Notification::create([
                'user' => auth()->user()->name,
                'role' => "Admin",
                'message' => "Updated appointment of type " . $request->type . " from User " . auth()->user()->name,
                'appointment_id' => $id
            ]);
            return redirect()->back()->with('status', 'Appointment updated successfully!');
        }
        else
            return redirect()->back()->with('status', 'Appointment update failed!');
    }
}
