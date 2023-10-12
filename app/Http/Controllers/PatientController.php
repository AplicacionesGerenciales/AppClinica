<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

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
}
