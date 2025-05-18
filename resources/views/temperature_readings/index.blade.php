<x-app-layyout>
<div class="container">
    <h2>Temperature Readings</h2>

    <form method="GET" action="{{ route('temperature-readings.index') }}" class="mb-3">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search..." class="form-control w-25 d-inline-block">
        <button type="submit" class="btn btn-primary">Search</button>
        <a href="{{ route('temperature-readings.create') }}" class="btn btn-success float-end">+ Record</a>
        <a href="{{ route('temperature-readings.exportPdf') }}" class="btn btn-secondary float-end me-2">📄 Export PDF</a>
    </form>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Room</th>
                <th>Device</th>
                <th>Temperature (°C)</th>
                <th>Recorded At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($temperatureReadings as $reading)
            <tr>
                <td>{{ $reading->room->name }}</td>
                <td>{{ $reading->device->name }}</td>
                <td>{{ $reading->temperature }}</td>
                <td>{{ $reading->created_at->format('Y-m-d H:i') }}</td>
                <td>
                    <a href="{{ route('temperature-readings.edit', $reading) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('temperature-readings.destroy', $reading) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $temperatureReadings->appends(['search' => $search])->links() }}
</div>
</x-app-layyout>