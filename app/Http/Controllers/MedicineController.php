<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

/**
 * Class MedicineController
 * @package App\Http\Controllers
 */
class MedicineController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-medicamento', ['only' => ['index']]);
        $this->middleware('permission:crear-medicamento', ['only' => ['create','store']]);
        $this->middleware('permission:editar-medicamento', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-medicamento', ['only' => ['destroy']]);
    }

    public function index()
    {
        $medicines = Medicine::paginate();
        return view('medicine.index', compact('medicines'))->with('i', (request()->input('page', 1) - 1) * $medicines->perPage());
    }
    public function store(Request $request)
    {
        request()->validate(Medicine::$rules, Medicine::$messages);
        Medicine::create($request->all());
        return redirect()->route('medicines.index')->with('mensaje', 'OkCreate');
    }
    public function update(Request $request, $id)
    {
        request()->validate(Medicine::$rules, Medicine::$messages);
        $Medicine = request()->except('_token', '_method');
        Medicine::where('id', $id)->update($Medicine);
        return redirect()->route('medicines.index')->with('mensaje', 'OkUpdate');
    }
    public function destroy($id)
    {
        Medicine::find($id)->delete();
        return redirect()->route('medicines.index')->with('mensaje', 'OkDelete');
    }
}
