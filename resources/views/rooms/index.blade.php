<x-app-layyout>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Room Management</h2>
        <a href="{{ route('rooms.create') }}" class="btn btn-success">+ Add Room</a>
    </div>

    {{-- Search Form --}}
    <form method="GET" action="{{ route('rooms.index') }}" class="row g-2 align-items-center mb-3">
        <div class="col-auto">
            <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search rooms...">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    {{-- Success Message --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    {{-- Table --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover table-bordered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Created At</th>
                        <th style="width: 180px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rooms as $room)
                    <tr>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('rooms.edit', $room) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this room?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">No rooms found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}    
    <div class="mt-3">
        {{ $rooms->appends(['search' => $search])->links() }}
    </div>
</div>
</x-app-layyout>