<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(){
        $appointments = Appointment::all();
        return view('appointments.index', compact('appointments'));
    }

    public function create(){
        $patients = Patient::all();
        return view('appointments.create', compact('patients'));
    }

    public function edit(Appointment $appointment)
    {
        return view('appointments.edit', compact('appointment'));
    }
    public function update(Request $request, Appointment $appointment)
    {

        $appointment->update($request->all());

        return redirect()->route('appointments.index');
    }


    public function store(Request $request){
        Appointment::create($request->all());
        return redirect()->route('appointments.index');
    }

    public function destroy(Appointment $appointment){
        $appointment -> delete();
        
        return redirect()->route('appointments.index');
    }



}
