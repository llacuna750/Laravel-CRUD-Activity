@extends('layawt')

@section('content')
<div class="container">
    <h1>Edit Temperature Record</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('temperatures.update', $temperature->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="sensor_name">Sensor Name</label>
            <input type="text" name="sensor_name" id="sensor_name" class="form-control" value="{{ old('sensor_name', $temperature->sensor_name) }}" required>
        </div>

        <div class="form-group">
            <label for="temperature">Temperature (°C)</label>
            <input type="number" name="temperature" id="temperature" class="form-control" value="{{ old('temperature', $temperature->temperature) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Record</button>
    </form>
</div>
@endsection
