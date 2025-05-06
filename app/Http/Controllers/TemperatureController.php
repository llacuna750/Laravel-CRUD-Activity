<?php

    namespace App\Http\Controllers;

    use App\Models\Temperature;
    use Illuminate\Http\Request;
    use Barryvdh\DomPDF\Facade\Pdf;

    class TemperatureController extends Controller
    {
        public function exportPdf()
        {
            $temperatures = Temperature::all();
            $pdf = Pdf::loadView('temperatures.pdf', compact('temperatures'));

            return $pdf->download('temperature_records.pdf');
        }



        /**
         * Display a listing of the resource.
         */
        public function index(Request $request)
    {
        $search = $request->input('search');

        $temperatures = Temperature::query();

        if ($search) {
            $temperatures->where(function ($query) use ($search) {
                $query->where('sensor_name', 'like', "%{$search}%")
                    ->orWhere('temperature', 'like', "%{$search}%")
                    ->orWhere(function ($query) use ($search) {
                        if (strtolower($search) === 'cold') {
                            $query->where('temperature', '<', 20);
                        } elseif (strtolower($search) === 'normal') {
                            $query->whereBetween('temperature', [20, 30]);
                        } elseif (strtolower($search) === 'hot') {
                            $query->where('temperature', '>', 30);
                        }
                    });
            });
        }

        $temperatures = $temperatures->orderBy('created_at', 'asc')->paginate(5);

        return view('temperatures.index', compact('temperatures', 'search'));
    }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            return view('temperatures.create');
        }


        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $validated = $request->validate([
                'sensor_name' => 'required|string|max:255',
                'temperature' => 'required|numeric',
            ]);

            Temperature::create($validated);

            return redirect()->route('temperatures.index')->with('success', 'Temperature record added!');
        }


        /**
         * Display the specified resource.
         */
        public function show(Temperature $temperature)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit($id)
        {
            $temperature = Temperature::findOrFail($id);
            return view('temperatures.edit', compact('temperature'));
        }


        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, $id)
        {
            $temperature = Temperature::findOrFail($id);

            $validated = $request->validate([
                'sensor_name' => 'required|string|max:255',
                'temperature' => 'required|numeric',
            ]);

            $temperature->update($validated);

            return redirect()->route('temperatures.index')->with('success', 'Temperature record updated!');
        }


        /**
         * Remove the specified resource from storage.
         */
        public function destroy($id)
        {
            $temperature = Temperature::findOrFail($id);
            $temperature->delete();

            return redirect()->route('temperatures.index')->with('success', 'Temperature record deleted!');
        }

    }
