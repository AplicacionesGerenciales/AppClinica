<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use Illuminate\Http\Request;

/**
 * Class ExaminationController
 * @package App\Http\Controllers
 */
class ExaminationController extends Controller
{
    public function index()
    {
        $examinations = Examination::paginate();
        return view('examination.index', compact('examinations'))->with('i', (request()->input('page', 1) - 1) * $examinations->perPage());
    }
    public function store(Request $request)
    {
        request()->validate(Examination::$rules, Examination::$messages);
        Examination::create($request->all());
        return redirect()->route('examinations.index')->with('success', 'Examination created successfully.');
    }
    public function update(Request $request, $id)
    {
        request()->validate(Examination::$rules, Examination::$messages);
        $Examination = request()->except('_token', '_method');
        Examination::where('id', $id)->update($Examination);
        return redirect()->route('examinations.index')->with('success', 'Examination updated successfully');
    }
    public function destroy($id)
    {
        Examination::find($id)->delete();
        return redirect()->route('examinations.index')->with('success', 'Examination deleted successfully');
    }
}
