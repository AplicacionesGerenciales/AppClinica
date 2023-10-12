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
    public function index()
    {
        $schedules = Schedule::paginate();
        return view('schedule.index', compact('schedules'))->with('i', (request()->input('page', 1) - 1) * $schedules->perPage());
    }
    public function store(Request $request)
    {
        request()->validate(Schedule::$rules, Schedule::$messages);
        Schedule::create($request->all());
        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully.');
    }
    public function update(Request $request, $id)
    {
        request()->validate(Schedule::$rules, Schedule::$messages);
        $Schedule = request()->except('_token', '_method');
        Schedule::where('id', $id)->update($Schedule);
        return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully');
    }
    public function destroy($id)
    {
        Schedule::find($id)->delete();
        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully');
    }
}
