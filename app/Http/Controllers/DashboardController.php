<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\Patient;
use App\Models\User;
use App\Models\Specialty;
use App\Models\TypeExamination;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $Users = User::count();
        $Patients = Patient::count();
        $typeexaminations = TypeExamination::all()->count();

        // $CommonDiseases = Ciedisease::withCount('consultations')->orderBy('Id_Disease', 'desc')->take(5)->get();
        // $OutputsSum = Outputbatch::sum('Amount');
        $specialties = Specialty::all();
        $diseases = Disease::all();
        $dataSpecialty = []; 
        $dataDisease = [];
        foreach ($specialties as $specialty)
        {
            $dataSpecialty['data'][] = $specialty->specialty;
            $dataSpecialty['label'][] = $specialty->description;
        }
        foreach ($diseases as $disease)
        {
            $dataDisease['data'][] = $disease->name;
        }
        $dataSpecialty['data'] = json_encode($dataSpecialty);
        $dataDisease['data'] = json_encode($dataDisease);

        return view('dashboard.index', compact('dataSpecialty', 'dataDisease', 'Users', 'Patients'));
    }
}
