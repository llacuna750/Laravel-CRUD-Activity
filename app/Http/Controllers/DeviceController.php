<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $devices = Device::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(5);

        return view('devices.index', compact('devices', 'search'));
    }

    public function create()
    {
        return view('devices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Device::create($request->only('name'));

        return redirect()->route('devices.index')->with('success', 'Device created successfully.');
    }

    public function edit(Device $device)
    {
        return view('devices.edit', compact('device'));
    }

    public function update(Request $request, Device $device)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $device->update($request->only('name'));

        return redirect()->route('devices.index')->with('success', 'Device updated successfully.');
    }

    public function destroy(Device $device)
    {
        $device->delete();

        return redirect()->route('devices.index')->with('success', 'Device deleted successfully.');
    }
}
