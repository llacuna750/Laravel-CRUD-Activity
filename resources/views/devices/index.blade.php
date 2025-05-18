<x-app-layyout>
<div class="container">
    <h2 class="mb-4">Devices</h2>

    <form method="GET" action="{{ route('devices.index') }}" class="mb-3">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search devices..." class="form-control w-25 d-inline-block">
        <button type="submit" class="btn btn-primary">Search</button>
        <a href="{{ route('devices.create') }}" class="btn btn-success float-end">+ Add Device</a>
    </form>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($devices as $device)
            <tr>
                <td>{{ $device->name }}</td>
                <td>{{ $device->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('devices.edit', $device) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('devices.destroy', $device) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this device?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $devices->appends(['search' => $search])->links() }}
</div>
</x-app-layyout>