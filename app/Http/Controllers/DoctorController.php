<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class DoctorController
 * @package App\Http\Controllers
 */
class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::paginate(); 
        $especialidad = Specialty::all();
        $users= User::all();
        return view('doctor.index', compact('doctors','especialidad','users'))->with('i', (request()->input('page', 1) - 1) * $doctors->perPage());
    }
   
    public function store(Request $request)
{
    try{
        DB::transaction(function () use($request) {
            $user = User::create([
                'name' => $request['name'].$request['identity_card'],
                'email' => $request['identity_card'].'@correo.ni',
                'password' => Hash::make($request['identity_card']),

            ]);
            $request->request->add(['user_id' => $user->id]);
            $request->validate(Doctor::rules($user->id), Doctor::$messages);
            Doctor::create($request->all());
        });
    }
    catch(\Throwable $th){
        return redirect()->route('doctors.index')->with('mensaje', 'FailCreate');
    }
     
    return redirect()->route('doctors.index')->with('mensaje', 'OkCreate');

}


public function update(Request $request, $id)
{
    $rules = Doctor::rules($id);
    request()->validate($rules, Doctor::$messages);
    $Doctor = request()->except('_token', '_method');
    
    Doctor::where('id', $id)->update($Doctor);
    return redirect()->route('doctors.index')->with('mensaje', 'OkUpdate');
}

    public function destroy($id)
    {
        Doctor::find($id)->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }
}
