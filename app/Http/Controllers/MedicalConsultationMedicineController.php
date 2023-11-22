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
    function __construct()
    {
        $this->middleware('permission:ver-consulta-medica-medicina', ['only' => ['index']]);
        $this->middleware('permission:crear-consulta-medica-medicina', ['only' => ['create','store']]);
        $this->middleware('permission:editar-consulta-medica-medicina', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-consulta-medica-medicina', ['only' => ['destroy']]);
    }

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
