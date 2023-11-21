<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

/**
 * Class ScheduleController
 * @package App\Http\Controllers
 */
class ScheduleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-horario', ['only' => ['index']]);
        $this->middleware('permission:crear-horario', ['only' => ['create','store']]);
        $this->middleware('permission:editar-horario', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-horario', ['only' => ['destroy']]);
    }

    public function index()
    {
        $schedules = Schedule::paginate();
        return view('schedule.index', compact('schedules'))->with('i', (request()->input('page', 1) - 1) * $schedules->perPage());
    }
    public function store(Request $request)
    {
        request()->validate(Schedule::$rules, Schedule::$messages);
        Schedule::create($request->all());
        return redirect()->route('schedules.index')->with('mensaje', 'OkCreate');
    }
    public function update(Request $request, $id)
    {
        request()->validate(Schedule::$rules, Schedule::$messages);
        $Schedule = request()->except('_token', '_method');
        Schedule::where('id', $id)->update($Schedule);
        return redirect()->route('schedules.index')->with('mensaje', 'OkUpdate');
    }

    public function destroy($id)
    {
        Schedule::find($id)->delete();
        return redirect()->route('schedules.index')->with('success', 'OkDelete');
    }
}
