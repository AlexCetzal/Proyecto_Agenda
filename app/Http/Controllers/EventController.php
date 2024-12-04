<?php

namespace App\Http\Controllers;

use App\Models\Events;
use DateTime;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('actividades_Modelo'); 
    }

    public function getEvents(Request $request)
    {
        $section = strtolower($request->query('section'));
        if ($section == 'centro_cultural') {
            $section = 1;
        }
        if ($section == 'campos_modelo') {
            $section = 2;
        }
        if ($section == 'actividades_modelo') {
            $section = 3;
        }
        if ($section == 'transporte') { 
            $section = 4; 
        } 

        $events = Events::where('tipo_evento', $section)
            ->select('id', 'title', 'description', 'start', 'startTime', 'end', 'endTime', 'optiones')
            ->get();
        return response()->json($events);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'start' => 'required|date',
                'startTime' => 'required|date_format:H:i',
                'end' => 'nullable|date|after_or_equal:start',
                'endTime' => 'nullable|date_format:H:i',
                'description' => 'nullable|string',
                'optiones' => 'required|string',
                'section' => 'required|string',
            ]);
            $validated['start'] = (new DateTime($validated['start']))->format('Y-m-d');

            $validated['end'] = $request->input('end')
            ? (new DateTime($request->input('end')))->format('Y-m-d')
            : $validated['start'];

            $validated['startTime'] = $validated['start'] . ' ' . $validated['startTime'];
            if ($validated['endTime']) {
                $validated['endTime'] = $validated['end'] . ' ' . $validated['endTime'];
            }

            $existingEvent = Events::where('start', $validated['start'])
                ->where('startTime', $validated['startTime'])
                ->first();

            if ($existingEvent) {
                return response()->json(['error' => 'Ya existe un evento en esta fecha y hora.'], 400);
            }
            $validated['section'] = strtolower($validated['section']);
            if ($validated['section'] == 'centro_cultural') {
                $validated['tipo_evento'] = 1;
            } elseif ($validated['section'] == 'campos_modelo') {
                $validated['tipo_evento'] = 2;
            } elseif ($validated['section'] == 'actividades_modelo') {
                $validated['tipo_evento'] = 3;
            } elseif ($validated['section'] == 'transporte') {
                $validated['tipo_evento'] = 4;
            } else {
                return response()->json(['error' => 'Sección inválida.'], 400);
            }

            $event = Events::create($validated);
            return response()->json(['success' => true, 'event' => $event], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 400);
        }
    }
}
