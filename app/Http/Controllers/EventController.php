<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function createEvent(Request $request)
    {
        $event = new Event([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'datetime' => $request->input('datetime'),
        ]);

        event($event);

        return response()->json(['status' => 'Evento creado exitosamente.']);
    }
}
