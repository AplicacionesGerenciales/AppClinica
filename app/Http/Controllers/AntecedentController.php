<?php

namespace App\Http\Controllers;

use App\Models\Antecedent;
use App\Models\File;
use Illuminate\Http\Request;

/**
 * Class AntecedentController
 * @package App\Http\Controllers
 */
class AntecedentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-antecedente', ['only' => ['index']]);
        $this->middleware('permission:crear-antecedente', ['only' => ['create','store']]);
        $this->middleware('permission:editar-antecedente', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-antecedente', ['only' => ['destroy']]);
    }

    public function index()
    {
        $antecedents = Antecedent::paginate();
        $files= File::all();
        return view('antecedent.index', compact('antecedents','files'))->with('i', (request()->input('page', 1) - 1) * $antecedents->perPage());
    }
    public function store(Request $request)
    {
        request()->validate(Antecedent::$rules, Antecedent::$messages);
        Antecedent::create($request->all());
        return redirect()->route('antecedents.index')->with('mensaje', 'OkCreate');
    }
    public function update(Request $request, $id)
    {
        request()->validate(Antecedent::$rules, Antecedent::$messages);
        $Antecedent = request()->except('_token', '_method');
        Antecedent::where('id', $id)->update($Antecedent);
        return redirect()->route('antecedents.index')->with('mensaje', 'OkUpdate');
    }
    public function destroy($id)
    {
        Antecedent::find($id)->delete();
        return redirect()->route('antecedents.index')->with('mensaje', 'OkDelete');
    }
}
