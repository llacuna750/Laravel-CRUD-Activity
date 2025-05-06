@extends('layawt')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Temperature Records</h2>
    <div>
        <a href="{{ route('temperatures.create') }}" class="btn btn-success">Add New Record</a>
        <a href="{{ route('temperatures.export-pdf') }}" class="btn btn-outline-danger">Export PDF</a> <!-- 👈 Export Button Here -->
    </div>
</div>

<!-- Search Form -->
<form action="{{ route('temperatures.index') }}" method="GET" class="row mb-4">
    <div class="col-md-4">
        <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search by Areas name, temperature, or status">
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">Search</button>
    </div>
</form>

<!-- Table -->
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Areas</th>
                <th>Temperature</th>
                <th>Status</th>
                <th>Recorded At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($temperatures as $temperature)
                <tr>
                    <td>{{ $temperature->id }}</td>
                    <td>{{ $temperature->sensor_name }}</td>
                    <td>{{ $temperature->temperature }}°C</td>
<td>
    @if ($temperature->temperature < 20)
        <span class="badge bg-info">Cold</span>
    @elseif ($temperature->temperature >= 20 && $temperature->temperature <= 30)
        <span class="badge bg-success">Normal</span>
    @else
        <span class="badge bg-danger">Hot</span>
    @endif
</td>

                    <td>{{ $temperature->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ route('temperatures.edit', $temperature->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('temperatures.destroy', $temperature->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
{{ $temperatures->withQueryString()->links() }}

@endsection
