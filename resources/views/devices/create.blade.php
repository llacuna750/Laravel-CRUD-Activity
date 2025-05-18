<x-app-layyout>
<div class="container">
    <h2>Create Device</h2>

    <form action="{{ route('devices.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button class="btn btn-success">Save</button>
        <a href="{{ route('devices.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</x-app-layyout>