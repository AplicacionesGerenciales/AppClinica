<?php

namespace App\Http\Controllers;

use App\Events\PatienEvent;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NotificationX;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PatientsExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
/**
 * Class PatientController
 * @package App\Http\Controllers
 */
class PatientController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-paciente', ['only' => ['index']]);
        $this->middleware('permission:crear-paciente', ['only' => ['create','store']]);
        $this->middleware('permission:editar-paciente', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-paciente', ['only' => ['destroy']]);
    }

    public function index()
    {
        $patients = Patient::paginate();
        return view('patient.index', compact('patients'))->with('i', (request()->input('page', 1) - 1) * $patients->perPage());
    }

    //cosos que modifique
    public function create()
    {
        $postNotifications = auth()->user()->unreadNotifications;
        $user = \App\Models\User::find(1);
        
    // Pasa la instancia del modelo a la vista "create" para mostrar el formulario
    return view('patient.create', compact('postNotifications'));
    }

    public function show($id)
    {
        $patient = Patient::findOrFail($id);

        return view('patient.show', compact('patient'));
    }
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);

        return view('patient.edit', compact('patient'));
    }
    //cosos que modifique

    public function store(Request $request)
    {
        try{
            DB::transaction(function () use($request) {
                $user = User::create([
                    'name' => $request['name'].$request['identification_card'],
                    'email' => $request['address'],
                    'password' => Hash::make($request['identification_card']),
                ]);
                $user->assignRole(2);
                $request->request->add(['user_id' => $user->id]);
                request()->validate(Patient::$rules, Patient::$messages); 
                Patient::create($request->all()); 
            });
        }
        catch(\Throwable $th){
            return redirect()->route('patients.index')->with('mensaje', 'failCreate');
        }
        return redirect()->route('patients.index')->with('mensaje', 'OkCreate');
    }
    public function update(Request $request, $id)
    {
        request()->validate(Patient::$rules, Patient::$messages);
        $Patient = request()->except('_token', '_method');
        Patient::where('id', $id)->update($Patient);
        return redirect()->route('patients.index')->with('mensaje', 'OkUpdate');
    }
    public function destroy($id)
    {
        Patient::find($id)->delete();
        return redirect()->route('patients.index')->with('mensaje', 'OkDelete');
    }

    public function markNotification(Request $request)
    {
        auth()->user()->unreadNotifications
        ->when($request->input('id'), function($query) use ($request)
        {
            return $query->where('id', $request->input('id'));  
        })->marKAsRead();

        return response()->noContent();
    }

    // public function PatientNotification()
    // {
    //     return view('patient.notification');
    // }

    public function importExcel(){
        return Excel::download(new PatientsExport, 'patient.xlsx');
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
