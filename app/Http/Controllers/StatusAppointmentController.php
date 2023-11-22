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
    function __construct()
    {
        $this->middleware('permission:ver-estado-cita', ['only' => ['index']]);
        $this->middleware('permission:crear-estado-cita', ['only' => ['create','store']]);
        $this->middleware('permission:editar-estado-cita', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-estado-cita', ['only' => ['destroy']]);
    }
    
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
