<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Patient;
use Illuminate\Http\Request;

/**
 * Class FileController
 * @package App\Http\Controllers
 */
class FileController extends Controller
{
    public function index()
    {
        $files = File::paginate();
        $patients= Patient::all();
        return view('file.index', compact('files','patients'))->with('i', (request()->input('page', 1) - 1) * $files->perPage());
    }
    public function store(Request $request)
    {
        request()->validate(File::$rules, File::$messages);
        File::create($request->all());
        return redirect()->route('files.index')->with('mensaje', 'OkCreate');
    }
    public function update(Request $request, $id)
    {
        request()->validate(File::$rules, File::$messages);
        $File = request()->except('_token', '_method');
        File::where('id', $id)->update($File);
        return redirect()->route('files.index')->with('mensaje', 'OkUpdate');
    }
    public function destroy($id)
    {
        File::find($id)->delete();
        return redirect()->route('files.index')->with('mensaje', 'OkDelete');
    }
}
