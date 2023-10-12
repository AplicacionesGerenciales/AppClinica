<?php

namespace App\Http\Controllers;

use App\Models\Antecedent;
use Illuminate\Http\Request;

/**
 * Class AntecedentController
 * @package App\Http\Controllers
 */
class AntecedentController extends Controller
{
    public function index()
    {
        $antecedents = Antecedent::paginate();
        return view('antecedent.index', compact('antecedents'))->with('i', (request()->input('page', 1) - 1) * $antecedents->perPage());
    }
    public function store(Request $request)
    {
        request()->validate(Antecedent::$rules, Antecedent::$messages);
        Antecedent::create($request->all());
        return redirect()->route('antecedents.index')->with('success', 'Antecedent created successfully.');
    }
    public function update(Request $request, $id)
    {
        request()->validate(Antecedent::$rules, Antecedent::$messages);
        $Antecedent = request()->except('_token', '_method');
        Antecedent::where('id', $id)->update($Antecedent);
        return redirect()->route('antecedents.index')->with('success', 'Antecedent updated successfully');
    }
    public function destroy($id)
    {
        Antecedent::find($id)->delete();
        return redirect()->route('antecedents.index')->with('success', 'Antecedent deleted successfully');
    }
}
