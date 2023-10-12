<?php

namespace App\Http\Controllers;

use App\Models\MedicalConsultation;
use Illuminate\Http\Request;

/**
 * Class MedicalConsultationController
 * @package App\Http\Controllers
 */
class MedicalConsultationController extends Controller
{
    public function index()
    {
        $medicalConsultations = MedicalConsultation::paginate();
        return view('medical-consultation.index', compact('medicalConsultations'))->with('i', (request()->input('page', 1) - 1) * $medicalConsultations->perPage());
    }
    public function store(Request $request)
    {
        request()->validate(MedicalConsultation::$rules, MedicalConsultation::$messages);
        MedicalConsultation::create($request->all());
        return redirect()->route('medical-consultations.index')->with('success', 'MedicalConsultation created successfully.');
    }
    public function update(Request $request, $id)
    {
        request()->validate(MedicalConsultation::$rules, MedicalConsultation::$messages);
        $MedicalConsultation = request()->except('_token', '_method');
        MedicalConsultation::where('id', $id)->update($MedicalConsultation);
        return redirect()->route('medical-consultations.index')->with('success', 'MedicalConsultation updated successfully');
    }
    public function destroy($id)
    {
        MedicalConsultation::find($id)->delete();
        return redirect()->route('medical-consultations.index')->with('success', 'MedicalConsultation deleted successfully');
    }
}
