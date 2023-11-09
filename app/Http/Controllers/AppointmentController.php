<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;
/**
 * Class AppointmentController
 * @package App\Http\Controllers
 */
class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::paginate();
        return view('appointment.index', compact('appointments'))->with('i', (request()->input('page', 1) - 1) * $appointments->perPage()); 
    }
    public function create()
    {
        $appointment = new Appointment(); // Crea una instancia vacía del modelo Appointment
    return view('appointment.create', compact('appointment'));
    }
    public function store(Request $request)
    {
        request()->validate(Appointment::$rules, Appointment::$messages);
        /* Appointment::create($request->all()); */
        $date = Carbon::parse($request->input('date'))->format('Y-m-d');

        // Crear una nueva instancia de Appointment y asignar los valores
        $appointment = new Appointment;
        $appointment->date = $date;
        $appointment->comment = $request->input('comment');
        $appointment->patient_id = $request->input('patient_id');
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->appointment_status_id = $request->input('appointment_status_id');
    
        // Guardar el nuevo registro
        $appointment->save();

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);

        return view('appointment.show', compact('appointment'));
    }
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);

        return view('appointment.edit', compact('appointment'));
    }


    public function update(Request $request, $id)
    {
        request()->validate(Appointment::$rules, Appointment::$messages);
        $Appointment = request()->except('_token', '_method');
        Appointment::where('id', $id)->update($Appointment);
        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully');
    }
    public function destroy($id)
    {
        Appointment::find($id)->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully');
    }
}
