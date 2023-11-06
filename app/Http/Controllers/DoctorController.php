<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Http\Request;



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

        return view('doctor.index', compact('doctors','especialidad'))->with('i', (request()->input('page', 1) - 1) * $doctors->perPage());

    }

    public function store(Request $request)
{
    $request->validate(Doctor::rules(null), Doctor::$messages);
    Doctor::create($request->all());
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
