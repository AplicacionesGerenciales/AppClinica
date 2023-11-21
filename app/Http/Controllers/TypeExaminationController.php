<?php

namespace App\Http\Controllers;

use App\Models\TypeExamination;
use Illuminate\Http\Request;

/**
 * Class TypeExaminationController
 * @package App\Http\Controllers
 */
class TypeExaminationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-tipo-examen', ['only' => ['index']]);
        $this->middleware('permission:crear-tipo-examen', ['only' => ['create','store']]);
        $this->middleware('permission:editar-tipo-examen', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-tipo-examen', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $typeExaminations = TypeExamination::paginate();
        return view('type-examination.index', compact('typeExaminations'))->with('i', (request()->input('page', 1) - 1) * $typeExaminations->perPage());
    }
    public function store(Request $request)
    {
        request()->validate(TypeExamination::$rules, TypeExamination::$messages);
        TypeExamination::create($request->all());
        return redirect()->route('type-examinations.index')->with('success', 'TypeExamination created successfully.');
    }
    public function update(Request $request, $id)
    {
        request()->validate(TypeExamination::$rules, TypeExamination::$messages);
        $TypeExamination = request()->except('_token', '_method');
        TypeExamination::where('id', $id)->update($TypeExamination);
        return redirect()->route('type-examinations.index')->with('success', 'TypeExamination updated successfully');
    }
    public function destroy($id)
    {
        TypeExamination::find($id)->delete();
        return redirect()->route('type-examinations.index')->with('success', 'TypeExamination deleted successfully');
    }
}
