<?php

namespace App\Http\Controllers;

use App\Models\MedicalConsultationMedicine;
use Illuminate\Http\Request;

/**
 * Class MedicalConsultationMedicineController
 * @package App\Http\Controllers
 */
class MedicalConsultationMedicineController extends Controller
{
    public function index()
    {
        $medicalConsultationMedicines = MedicalConsultationMedicine::paginate();
        return view('medical-consultation-medicine.index', compact('medicalConsultationMedicines'))->with('i', (request()->input('page', 1) - 1) * $medicalConsultationMedicines->perPage());
    }
    public function store(Request $request)
    {
        request()->validate(MedicalConsultationMedicine::$rules, MedicalConsultationMedicine::$messages);
        MedicalConsultationMedicine::create($request->all());
        return redirect()->route('medical-consultation-medicines.index')->with('success', 'MedicalConsultationMedicine created successfully.');
    }
    public function update(Request $request, $id)
    {
        request()->validate(MedicalConsultationMedicine::$rules, MedicalConsultationMedicine::$messages);
        $MedicalConsultationMedicine = request()->except('_token', '_method');
        MedicalConsultationMedicine::where('id', $id)->update($MedicalConsultationMedicine);
        return redirect()->route('medical-consultation-medicines.index')->with('success', 'MedicalConsultationMedicine updated successfully');
    }
    public function destroy($id)
    {
        MedicalConsultationMedicine::find($id)->delete();
        return redirect()->route('medical-consultation-medicines.index')->with('success', 'MedicalConsultationMedicine deleted successfully');
    }
}
