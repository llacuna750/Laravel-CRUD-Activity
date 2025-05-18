<x-app-layyout>
    <div class="container">
        <h2>Record Temperature</h2>
        <form method="POST" action="{{ route('temperature-readings.store') }}">
            @csrf

            <div class="mb-3">
                <label for="room_id">Room</label>
                <select name="room_id" class="form-control" required>
                    @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="device_id">Device</label>
                <select name="device_id" class="form-control" required>
                    @foreach($devices as $device)
                    <option value="{{ $device->id }}">{{ $device->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="temperature">Temperature (°C)</label>
                <input type="number" step="0.1" name="temperature" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="recorded_at">Recorded At (optional)</label>
                <input type="datetime-local" name="recorded_at" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Save Reading</button>
        </form>
    </div>
</x-app-layyout>