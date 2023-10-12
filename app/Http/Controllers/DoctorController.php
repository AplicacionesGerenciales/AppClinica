<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
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
        return view('doctor.index', compact('doctors'))->with('i', (request()->input('page', 1) - 1) * $doctors->perPage());
    }
    public function store(Request $request)
    {
        request()->validate(Doctor::$rules, Doctor::$messages);
        Doctor::create($request->all());
        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully.');
    }
    public function update(Request $request, $id)
    {
        request()->validate(Doctor::$rules, Doctor::$messages);
        $Doctor = request()->except('_token', '_method');
        Doctor::where('id', $id)->update($Doctor);
        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully');
    }
    public function destroy($id)
    {
        Doctor::find($id)->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }
}
