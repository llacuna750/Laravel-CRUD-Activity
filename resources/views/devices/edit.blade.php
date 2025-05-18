<x-app-layyout>
<div class="container">
    <h2>Edit Device</h2>

    <form action="{{ route('devices.update', $device) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $device->name }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('devices.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</x-app-layyout>