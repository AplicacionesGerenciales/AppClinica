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
    public function index()
    {
        $diseaseGroups = DiseaseGroup::paginate();
        return view('disease-group.index', compact('diseaseGroups'))->with('i', (request()->input('page', 1) - 1) * $diseaseGroups->perPage());
    }
    public function store(Request $request)
    {
        request()->validate(DiseaseGroup::$rules, DiseaseGroup::$messages);
        DiseaseGroup::create($request->all());
        return redirect()->route('disease-groups.index')->with('success', 'DiseaseGroup created successfully.');
    }
    public function update(Request $request, $id)
    {
        request()->validate(DiseaseGroup::$rules, DiseaseGroup::$messages);
        $DiseaseGroup = request()->except('_token', '_method');
        DiseaseGroup::where('id', $id)->update($DiseaseGroup);
        return redirect()->route('disease-groups.index')->with('success', 'DiseaseGroup updated successfully');
    }
    public function destroy($id)
    {
        DiseaseGroup::find($id)->delete();
        return redirect()->route('disease-groups.index')->with('success', 'DiseaseGroup deleted successfully');
    }
}
