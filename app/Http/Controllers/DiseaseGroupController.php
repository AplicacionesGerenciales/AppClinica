<?php

namespace App\Http\Controllers;

use App\Models\DiseaseGroup;
use Illuminate\Http\Request;

/**
 * Class DiseaseGroupController
 * @package App\Http\Controllers
 */
class DiseaseGroupController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-grupo-enfermedad', ['only' => ['index']]);
        $this->middleware('permission:crear-grupo-enfermedad', ['only' => ['create','store']]);
        $this->middleware('permission:editar-grupo-enfermedad', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-grupo-enfermedad', ['only' => ['destroy']]);
    }

    public function index()
    {
        $diseaseGroups = DiseaseGroup::paginate();
        return view('disease-group.index', compact('diseaseGroups'))->with('i', (request()->input('page', 1) - 1) * $diseaseGroups->perPage());
    }
    public function store(Request $request)
    {
        request()->validate(DiseaseGroup::$rules, DiseaseGroup::$messages);
        DiseaseGroup::create($request->all());
        return redirect()->route('disease-groups.index')->with('mensaje', 'OkCreate');
    }
    public function update(Request $request, $id)
    {
        request()->validate(DiseaseGroup::$rules, DiseaseGroup::$messages);
        $DiseaseGroup = request()->except('_token', '_method');
        DiseaseGroup::where('id', $id)->update($DiseaseGroup);
        return redirect()->route('disease-groups.index')->with('mensaje', 'OkUpdate');
    }
    public function destroy($id)
    {
        DiseaseGroup::find($id)->delete();
        return redirect()->route('disease-groups.index')->with('mensaje', 'OkDelete');
    }
}
