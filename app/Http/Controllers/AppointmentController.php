<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        request()->validate(Appointment::$rules, Appointment::$messages);
        Appointment::create($request->all());
        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
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
