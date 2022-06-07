<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Declarations;

class DeclarationsController extends Controller
{

    public function view_declarations(){
        $role = auth()->user()->role;
        if($role === "User")
            return redirect('/dashboard')->with('status', 'Not allowed!');
        else {
            $declarations = Declarations::get();
            return view('staff.declarations', [
                'declarations' => $declarations
            ]);
        }
        
    }

    public function view_declaration($id){
        $role = auth()->user()->role;

        if($role === "User")
            return redirect('/dashboard')->with('status', 'Not allowed!');
        else {
            $declaration = Declarations::where('id', $id)->first();
            return view('staff.declaration', [
                'declaration' => $declaration
            ]);
        }
    }

    public function search_declaration(Request $request){
        $role = auth()->user()->role;

        if($role === "User")
            return redirect('/dashboard')->with('status', 'Not allowed!');
        else {
            $search_for = $request->only('query');
            $declarations = Declarations::where('owner', $search_for)->get();
            return view('staff.declarations',[
                "declarations" => $declarations
            ]);
        }
    }

    public function add_declaration(Request $request){
        $role = auth()->user()->role;

        if($role === "User")
            return redirect('/dashboard')->with('status', 'Not allowed!');
        else {
            $this->validate($request, [
                'owner' => 'required',
                'date_declared' => 'required',
                'file' => 'required',
            ]);

            $path_to_file = $request->file('file')->store('public/declarations');

            $save = Declarations::create([
                'owner' => $request->owner,
                'date_declared' => $request->date_declared,
                'file' => $path_to_file,
            ]);
            if($save)
                return redirect()->back()->with('status', 'Declaration added!');
            else
                return redirect()->back()->with('status', 'Adding of declaration failed!');
        }
    }

    public function delete_declaration($id){
        $role = auth()->user()->role;

        if($role === "User")
            return redirect('/dashboard')->with('status', 'Not allowed!');
        else {
            $delete = Declarations::where('id', $id)->delete();

            if($delete)
                return redirect()->back()->with('status', 'Declaration deleted!');
            else
                return redirect()->back()->with('status', 'Declaration deletion failed!');
        }
    }
}
