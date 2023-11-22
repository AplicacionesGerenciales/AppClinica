<?php

namespace App\Http\Controllers;
use App\Models\TypeExamination;
use App\Models\Disease;
use App\Models\Doctor;
use App\Models\Examination;
use App\Models\File;
use App\Models\MedicalConsultation;
use Illuminate\Http\Request;

/**
 * Class MedicalConsultationController
 * @package App\Http\Controllers
 */
class MedicalConsultationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-consulta-medica', ['only' => ['index']]);
        $this->middleware('permission:crear-consulta-medica', ['only' => ['create','store']]);
        $this->middleware('permission:editar-consulta-medica', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-consulta-medica', ['only' => ['destroy']]);
    }

    public function index()
    {
        $medicalConsultations = MedicalConsultation::paginate();
        $doctor = Doctor::all();
        $file = File::all();
        $disease = Disease::all();
        $type_examination = TypeExamination::all();
        return view('medical-consultation.index', compact('medicalConsultations', 'doctor', 'file', 'disease', 'type_examination'))->with('i', (request()->input('page', 1) - 1) * $medicalConsultations->perPage());
    }
    public function store(Request $request)
    {

        $idexamination = $request->input('type_examination_id');
        $result = $request->input('result');
        
        request()->validate(MedicalConsultation::$rules, MedicalConsultation::$messages);

        $consultation = MedicalConsultation::create($request->all());
        if($idexamination !== 2){
            $idconsultation = $consultation->id;
            $array = [
                "result" => $result,
                "type_examination_id" => $idexamination,
                "medical_consultation_id" => $idconsultation
            ];
        }
        Examination::create($array);
        return redirect()->route('medical-consultations.index')->with('mensaje', 'OkCreate.');
    }
    public function update(Request $request, $id)
    {
        request()->validate(MedicalConsultation::$rules, MedicalConsultation::$messages);
        $MedicalConsultation = request()->except('_token', '_method');
        MedicalConsultation::where('id', $id)->update($MedicalConsultation);
        return redirect()->route('medical-consultations.index')->with('mensaje', 'OkUpdate');
    }
    public function destroy($id)
    {
        MedicalConsultation::find($id)->delete();
        return redirect()->route('medical-consultations.index')->with('mensaje', 'OkDelete');
    }
}
