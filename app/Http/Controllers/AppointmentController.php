<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AppointmentsExport;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\StatusAppointment;

/**
 * Class AppointmentController
 * @package App\Http\Controllers
 */
class AppointmentController extends Controller
{
    public function index()
    {
        /* $appointments = Appointment::paginate();
    

        return view('appointment.index', compact('appointments', 'patient', 'doctor', 'appointment_status'))->with('i', (request()->input('page', 1) - 1) * $appointments->perPage()); 
     */
    
        $appointments = Appointment::paginate();
        $doctor = Doctor::all();
        $appointment_status = StatusAppointment::all();
        $patient = Patient::all();
        $doctors = Doctor::join('appointments', 'doctors.id', '=', 'appointments.doctor_id')
        ->join('patients', 'patients.id', '=', 'appointments.patient_id')
        ->join('status_appointments', 'status_appointments.id', '=', 'appointments.appointment_status_id')
        ->select('appointments.doctor_id as appointment_status_id', 'appointments.doctor_id as doctor_id', 'appointments.patient_id as patient_id','appointments.id as id', 'appointments.date as date', 'appointments.comment as comment' ,'patients.name as patient', 'doctors.name as doctor', 'status_appointments.state as appointment_status')
        ->get(); 

        return view('appointment.index', compact('patient', 'doctor', 'appointment_status'))->with('i', (request()->input('page', 1) - 1) * $appointments->perPage())->with('appointments', $doctors); 

      //  return view('appointment.index', compact('patient', 'doctor', 'appointment_status'))->with('appointments', $doctors); 
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

        return redirect()->route('appointments.index')->with('mensaje', 'OkCreate');
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
        return redirect()->route('appointments.index')->with('mensaje', 'OkUpdate');
    }
    public function destroy($id)
    {
        Appointment::find($id)->delete();
        return redirect()->route('appointments.index')->with('mensaje', 'OkDelete');
    }

    public function importExcel(){
        return Excel::download(new AppointmentsExport, 'Appointments.xlsx');
    }
}
