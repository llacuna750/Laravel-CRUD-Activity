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
                <td>{{ $temperature->status }}</td>
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

<!-- Pagination -->
{{ $temperatures->withQueryString()->links() }}
