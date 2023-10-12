<?php

namespace App\Http\Controllers;

use App\Models\StatusAppointment;
use Illuminate\Http\Request;

/**
 * Class StatusAppointmentController
 * @package App\Http\Controllers
 */
class StatusAppointmentController extends Controller
{
    public function index()
    {
        $statusAppointments = StatusAppointment::paginate();
        return view('status-appointment.index', compact('statusAppointments'))->with('i', (request()->input('page', 1) - 1) * $statusAppointments->perPage());
    }
    public function store(Request $request)
    {
        request()->validate(StatusAppointment::$rules, StatusAppointment::$messages);
        StatusAppointment::create($request->all());
        return redirect()->route('status-appointments.index')->with('success', 'StatusAppointment created successfully.');
    }
    public function update(Request $request, $id)
    {
        request()->validate(StatusAppointment::$rules, StatusAppointment::$messages);
        $StatusAppointment = request()->except('_token', '_method');
        StatusAppointment::where('id', $id)->update($StatusAppointment);
        return redirect()->route('status-appointments.index')->with('success', 'StatusAppointment updated successfully');
    }
    public function destroy($id)
    {
        StatusAppointment::find($id)->delete();
        return redirect()->route('status-appointments.index')->with('success', 'StatusAppointment deleted successfully');
    }
}
