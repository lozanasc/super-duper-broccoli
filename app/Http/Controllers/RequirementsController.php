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
        try {
            $currAppointment = Appointment::where('id', $appointment_id)->first();

            $this->validate($request, [
                'consolidation_plan' => 'required|mimes:pdf',
                'deed' => 'required|mimes:pdf',
                'transfer_cert' => 'required|mimes:pdf',
                'tax_clearance' => 'required|mimes:pdf',
                'tax_receipt' => 'required|mimes:pdf',
            ]);

            $consolidation_plan = $request->file('consolidation_plan')->store('public/requirements/');
            $deed = $request->file('deed')->store('public/requirements/');
            $transfer_cert = $request->file('transfer_cert')->store('public/requirements/');
            $tax_clearance = $request->file('tax_clearance')->store('public/requirements/');
            $tax_receipt = $request->file('tax_receipt')->store('public/requirements/');

            $submit = Requirements::create([
                'user' => auth()->user()->name,
                'appointment_id' => $appointment_id,
                'type' => $currAppointment->type,
                'for' => "Appraisal and Assessment of New and Undeclared Real Property Units ",
                'consolidation_plan' => $consolidation_plan,
                'deed' => $deed,
                'transfer_cert' => $transfer_cert,
                'tax_clearance' => $tax_clearance,
                'tax_receipt' => $tax_receipt,
            ]);

            if($submit){
                Notification::create([
                    'user' => auth()->user()->name,
                    'role' => "Admin",
                    'message' => "Requirements for Appointment " . $appointment_id . " is submitted!",
                    'appointment_id' => $appointment_id
                ]);
                Notification::create([
                    'user' => auth()->user()->name,
                    'role' => "Staff",
                    'message' => "Requirements for Appointment " . $appointment_id . " is submitted!",
                    'appointment_id' => $appointment_id
                ]);
                Appointment::where('id', $appointment_id)->update(['complete' => "Complete"]);
                return redirect()->back()->with('status', 'Requirements submitted!');
            } else {
                return redirect()->back()->with('status', 'Requirements not submitted!');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
        

    }

    public function service2(Request $request, $appointment_id){

        $currAppointment = Appointment::where('id', $appointment_id)->first();

        $this->validate($request, [
            'consolidation_plan' => 'required|mimes:pdf',
            'deed' => 'required|mimes:pdf',
            'transfer_cert' => 'required|mimes:pdf',
            'tax_clearance' => 'required|mimes:pdf',
            'tax_receipt' => 'required|mimes:pdf',
            'petition_form' => 'required|mimes:pdf',
            'cert_auth_reg' => 'required|mimes:pdf',
        ]);

        $consolidation_plan = $request->file('consolidation_plan')->store('public/requirements/');
        $deed = $request->file('deed')->store('public/requirements/');
        $transfer_cert = $request->file('transfer_cert')->store('public/requirements/');
        $tax_clearance = $request->file('tax_clearance')->store('public/requirements/');
        $tax_receipt = $request->file('tax_receipt')->store('public/requirements/');
        $petition_form = $request->file('petition_form')->store('public/requirements/');
        $cert_auth_reg = $request->file('cert_auth_reg')->store('public/requirements/');

        $submit = Requirements::create([
            'user' => auth()->user()->name,
            'appointment_id' => $appointment_id,
            'type' => $currAppointment->type,
            'for' => "Transfer/Segregation/Consolidation of Tax Declaration of Donated/Sold/Subdivided/Consolidated Lots",
            'consolidation_plan' => $consolidation_plan,
            'deed' => $deed,
            'transfer_cert' => $transfer_cert,
            'tax_clearance' => $tax_clearance,
            'tax_receipt' => $tax_receipt,
            'petition_form' => $petition_form,
            'cert_auth_reg' => $cert_auth_reg,
        ]);

        if($submit){
            Notification::create([
                'user' => auth()->user()->name,
                'role' => "Admin",
                'message' => "Requirements for Appointment " . $appointment_id . " is submitted!",
                'appointment_id' => $appointment_id
            ]);
            Notification::create([
                'user' => auth()->user()->name,
                'role' => "Staff",
                'message' => "Requirements for Appointment " . $appointment_id . " is submitted!",
                'appointment_id' => $appointment_id
            ]);
            Appointment::where('id', $appointment_id)->update(['complete' => "Complete"]);
            return redirect()->back()->with('status', 'Requirements submitted!');
        } else {
            return redirect()->back()->with('status', 'Requirements not submitted!');
        }
    }

    public function service3(Request $request, $appointment_id){
        $currAppointment = Appointment::where('id', $appointment_id)->first();

        $this->validate($request, [
            'form' => 'required|mimes:png,jpg,pdf|max:10000',
        ]);

        $form = $request->file('form')->store('public/requirements/');

        $submit = Requirements::create([
            'user' => auth()->user()->name,
            'appointment_id' => $appointment_id,
            'type' => $currAppointment->type,
            'for' => "Issuance of Certified Photocopies and Certifications of Real Property Units ",
            'form' => $form,
        ]);

        if($submit){
            Notification::create([
                'user' => auth()->user()->name,
                'role' => "Admin",
                'message' => "Requirements for Appointment " . $appointment_id . " is submitted!",
                'appointment_id' => $appointment_id
            ]);
            Appointment::where('id', $appointment_id)->update(['complete' => "Complete"]);
            return redirect()->back()->with('status', 'Requirements submitted!');
        } else {
            return redirect()->back()->with('status', 'Requirements not submitted!');
        }
    }
}