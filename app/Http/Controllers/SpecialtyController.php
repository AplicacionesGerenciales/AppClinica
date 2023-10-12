<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

/**
 * Class SpecialtyController
 * @package App\Http\Controllers
 */
class SpecialtyController extends Controller
{
    public function index()
    {
        $specialties = Specialty::paginate();
        return view('specialty.index', compact('specialties'))->with('i', (request()->input('page', 1) - 1) * $specialties->perPage());
    }
    public function store(Request $request)
    {
        request()->validate(Specialty::$rules, Specialty::$messages);
        Specialty::create($request->all());
        return redirect()->route('specialties.index')->with('mensaje', 'OkCreate');
    }
    public function update(Request $request, $id)
    {
        request()->validate(Specialty::$rules, Specialty::$messages);
        $Specialty = request()->except('_token', '_method');
        Specialty::where('id', $id)->update($Specialty);
        return redirect()->route('specialties.index')->with('mensaje', 'OkUpdate');
    }
    public function destroy($id)
    {
        Specialty::find($id)->delete();
        return redirect()->route('specialties.index')->with('mensaje', 'OkDelete');
    }
}
