<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\DiseaseGroup;
use Illuminate\Http\Request;

/**
 * Class DiseaseController
 * @package App\Http\Controllers
 */
class DiseaseController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-enfermedad', ['only' => ['index']]);
        $this->middleware('permission:crear-enfermedad', ['only' => ['create','store']]);
        $this->middleware('permission:editar-enfermedad', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-enfermedad', ['only' => ['destroy']]);
    }

    public function index()
    {
        $diseases = Disease::paginate();
        $diseasesGroup = DiseaseGroup::all();
        return view('disease.index', compact('diseases','diseasesGroup'))->with('i', (request()->input('page', 1) - 1) * $diseases->perPage());
    }
    public function store(Request $request)
    {
        request()->validate(Disease::$rules, Disease::$messages);
        Disease::create($request->all());
        return redirect()->route('diseases.index')->with('mansaje', 'OkCreate.');
    }
    public function update(Request $request, $id)
    {
        request()->validate(Disease::$rules, Disease::$messages);
        $Disease = request()->except('_token', '_method');
        Disease::where('id', $id)->update($Disease);
        return redirect()->route('diseases.index')->with('mansaje', 'OkUpdate');
    }
    public function destroy($id)
    {
        Disease::find($id)->delete();
        return redirect()->route('diseases.index')->with('mansaje', 'OkDelete');
    }
}
