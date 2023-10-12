<?php

namespace App\Http\Controllers;

use App\Models\DoctorNotification;
use Illuminate\Http\Request;

/**
 * Class DoctorNotificationController
 * @package App\Http\Controllers
 */
class DoctorNotificationController extends Controller
{
    public function index()
    {
        $doctorNotifications = DoctorNotification::paginate();
        return view('doctor-notification.index', compact('doctorNotifications'))->with('i', (request()->input('page', 1) - 1) * $doctorNotifications->perPage());
    }
    public function store(Request $request)
    {
        request()->validate(DoctorNotification::$rules, DoctorNotification::$messages);
        DoctorNotification::create($request->all());
        return redirect()->route('doctor-notifications.index')->with('success', 'DoctorNotification created successfully.');
    }
    public function update(Request $request, $id)
    {
        request()->validate(DoctorNotification::$rules, DoctorNotification::$messages);
        $DoctorNotification = request()->except('_token', '_method');
        DoctorNotification::where('id', $id)->update($DoctorNotification);
        return redirect()->route('doctor-notifications.index')->with('success', 'DoctorNotification updated successfully');
    }
    public function destroy($id)
    {
        DoctorNotification::find($id)->delete();
        return redirect()->route('doctor-notifications.index')->with('success', 'DoctorNotification deleted successfully');
    }
}
