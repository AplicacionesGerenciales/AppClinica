<?php

namespace App\Http\Controllers;

use App\Events\PatienEvent;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Notifications\NotificationX;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PatientsExport;

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
        $request->merge([
            'user_id' => auth()->id(),
        ]);

        request()->validate(Patient::$rules, Patient::$messages); 
        Patient::create($request->all()); 

        //esto lo que hace es enviar la notificion al mismo que crea es decir al el mismo
        //auth()->user()->notify(new NotificationX($patient));

        //ahora si enviara la notificacion a otros menos a el
        // User::all()
        // ->except($request->id)
        // ->each(function(User $user) use ($patient){
        //     $user->notify(new NotificationX($patient));
        // });

        //event(new PatienEvent($patient));


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

}
