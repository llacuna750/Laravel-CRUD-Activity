@extends('layawt')

@section('content')
<div class="container">
    <h1>Add Temperature Record</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('temperatures.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="sensor_name">Areas</label>
            <input type="text" name="sensor_name" id="sensor_name" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="temperature">Temperature (°C)</label>
            <input type="number" name="temperature" id="temperature" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Record</button>
    </form>
</div>
@endsection
