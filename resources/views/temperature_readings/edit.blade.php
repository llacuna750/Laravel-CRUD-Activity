<x-app-layyout>
<div class="container">
    <h2>Edit Temperature</h2>

    <form action="{{ route('temperature-readings.update', $temperatureReading) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Room</label>
            <select name="room_id" class="form-control" required>
                @foreach($rooms as $room)
                <option value="{{ $room->id }}" {{ $room->id == $temperatureReading->room_id ? 'selected' : '' }}>{{ $room->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Device</label>
            <select name="device_id" class="form-control" required>
                @foreach($devices as $device)
                <option value="{{ $device->id }}" {{ $device->id == $temperatureReading->device_id ? 'selected' : '' }}>{{ $device->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Temperature (°C)</label>
            <input type="number" name="temperature" step="0.1" class="form-control" value="{{ $temperatureReading->temperature }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('temperature-readings.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</x-app-layyout>