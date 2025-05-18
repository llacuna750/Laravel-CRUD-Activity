<?php

namespace App\Http\Controllers;

use App\Models\TemperatureReading;
use App\Models\Room;
use App\Models\Device;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TemperatureReadingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $temperatureReadings = TemperatureReading::with(['room', 'device'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('room', fn($q) => $q->where('name', 'like', "%{$search}%"))
                             ->orWhereHas('device', fn($q) => $q->where('name', 'like', "%{$search}%"))
                             ->orWhere('temperature', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5);

        return view('temperature_readings.index', compact('temperatureReadings', 'search'));
    }

    public function create()
    {
        $rooms = Room::all();
        $devices = Device::all();
        return view('temperature_readings.create', compact('rooms', 'devices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'device_id' => 'required|exists:devices,id',
            'temperature' => 'required|numeric',
            'recorded_at' => 'nullable|date',
        ]);

        TemperatureReading::create([
            'room_id' => $request->room_id,
            'device_id' => $request->device_id,
            'temperature' => $request->temperature,
            'recorded_at' => $request->recorded_at ?? now(),
        ]);

        return redirect()->route('temperature-readings.index')->with('success', 'Temperature reading added successfully!');
    }


    public function edit(TemperatureReading $temperatureReading)
    {
        $rooms = Room::all();
        $devices = Device::all();
        return view('temperature_readings.edit', compact('temperatureReading', 'rooms', 'devices'));
    }

    public function update(Request $request, TemperatureReading $temperatureReading)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'device_id' => 'required|exists:devices,id',
            'temperature' => 'required|numeric',
        ]);

        $temperatureReading->update($request->only('room_id', 'device_id', 'temperature'));

        return redirect()->route('temperature-readings.index')->with('success', 'Temperature updated successfully.');
    }

    public function destroy(TemperatureReading $temperatureReading)
    {
        $temperatureReading->delete();
        return redirect()->route('temperature-readings.index')->with('success', 'Temperature deleted.');
    }

    public function exportPdf()
    {
        $readings = TemperatureReading::with(['room', 'device'])->latest()->get();
        $pdf = Pdf::loadView('temperature_readings.pdf', compact('readings'));
        return $pdf->download('temperature_readings_report.pdf');
    }
}
