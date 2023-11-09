<?php

namespace App\Exports;


use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class AppointmentsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('appointment.ExportAppointment', ['appointments' => Appointment::all()]);
    }
}
