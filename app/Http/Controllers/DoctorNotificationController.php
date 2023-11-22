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
    function __construct()
    {
        $this->middleware('permission:ver-notificacion-doctor', ['only' => ['index']]);
        $this->middleware('permission:crear-notificacion-doctor', ['only' => ['create','store']]);
        $this->middleware('permission:editar-notificacion-doctor', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-notificacion-doctor', ['only' => ['destroy']]);
    }

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
