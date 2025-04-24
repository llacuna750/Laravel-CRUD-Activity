<?php

    namespace App\Http\Controllers;

    use App\Models\TemperatureRecord;
    use Illuminate\Http\Request;
    use Barryvdh\DomPDF\Facade\Pdf;

    class TemperatureRecordController extends Controller
    {
        // Show records with search + pagination
        public function index(Request $request)
        {
            $search = $request->input('search');

            $records = TemperatureRecord::when($search, function ($query, $search) {
                $query->where('temperature', 'like', "%{$search}%")
                    ->orWhere('humidity', 'like', "%{$search}%")
                    ->orWhere('recorded_at', 'like', "%{$search}%");
            })->orderBy('recorded_at', 'desc')->paginate(10);

            return view('temperature.index', compact('records', 'search'));
        }

        // Show form to create new record
        public function create()
        {
            return view('temperature.create');
        }

        // Store new record
        public function store(Request $request)
        {
            $request->validate([
                'temperature' => 'required|numeric',
                'humidity' => 'required|numeric',
                'recorded_at' => 'required|date',
            ]);

            TemperatureRecord::create($request->all());

            return redirect()->route('temperature.index')->with('success', 'Record added successfully.');
        }

        // Show edit form
        public function edit($id)
        {
            $record = TemperatureRecord::findOrFail($id);
            return view('temperature.edit', compact('record'));
        }

        // Update the record
        public function update(Request $request, $id)
        {
            $request->validate([
                'temperature' => 'required|numeric',
                'humidity' => 'required|numeric',
                'recorded_at' => 'required|date',
            ]);

            $record = TemperatureRecord::findOrFail($id);
            $record->update($request->all());

            return redirect()->route('temperature.index')->with('success', 'Record updated successfully.');
        }

        // Delete a record
        public function destroy($id)
        {
            TemperatureRecord::destroy($id);
            return redirect()->route('temperature.index')->with('success', 'Record deleted successfully.');
        }

        // Export PDF of records
        public function exportPDF()
        {
            $records = TemperatureRecord::all();
            $pdf = Pdf::loadView('temperature.pdf', compact('records'));
            return $pdf->download('temperature_records.pdf');
        }
    }
