@extends('layawt')

@section('content')
    <h1>Temperature Record</h1>

    <p>Location: {{ $temperature->sensor_location }}</p>
    <p>Temperature: {{ $temperature->temperature }} °C</p>
    <p>Recorded At: {{ $temperature->recorded_at }}</p>

    <a href="{{ route('temperatures.index') }}">Back to List</a>
@endsection
