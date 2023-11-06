<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class PatientController
 * @package App\Http\Controllers
 */
class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::paginate();
        return view('patient.index', compact('patients'))->with('i', (request()->input('page', 1) - 1) * $patients->perPage());
    }
    public function store(Request $request)
    {
        request()->validate(Patient::$rules, Patient::$messages);
        Patient::create($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }
    public function update(Request $request, $id)
    {
        request()->validate(Patient::$rules, Patient::$messages);
        $Patient = request()->except('_token', '_method');
        Patient::where('id', $id)->update($Patient);
        return redirect()->route('patients.index')->with('success', 'Patient updated successfully');
    }
    public function destroy($id)
    {
        Patient::find($id)->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully');
    }
    public function profile()
    {
        $id = Auth::id();
        $idusers = user::where('id', $id)->pluck('id')->first();
        $idpatient = Patient::where('user_id', $idusers)->pluck('id')->first();

        if($idpatient != null){
            $patients = Patient::find($idpatient);
            return view('patient.create', compact('patients'));
        }
        else{
            $iddoctor = Doctor::where('user_id', $idusers)->pluck('id')->first();
            if($iddoctor != null){
                $doctors = Doctor::find($iddoctor);
                return view('doctor.create', compact('doctors'));
            }
        }
    }
    public function updatepassword(Request $password)
    {
        $id = Auth::id();
        $users = User::find($id);
        $users->password = bcrypt($password);
        $users->save();
        return back()->with('mensaje', 'OkPasswordUpdate');
    }
}
