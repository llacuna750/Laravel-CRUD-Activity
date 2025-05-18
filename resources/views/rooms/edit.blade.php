<x-app-layyout>
<div class="container">
    <h2>Edit Room</h2>

    <form action="{{ route('rooms.update', $room) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $room->name }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</x-app-layyout>