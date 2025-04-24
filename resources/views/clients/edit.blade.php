@extends('layout')

@section('content')
    <h2>Edit Client</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Errors:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('clients.update', $client->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $client->name) }}" required>
        </div>

        <div class="mb-3">
            <label>Address:</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $client->address) }}" required>
        </div>

        <div class="mb-3">
            <label>Gender:</label>
            <select name="gender" class="form-select" required>
                <option value="Male" {{ old('gender', $client->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender', $client->gender) == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Date of Birth:</label>
            <input type="date" name="dob" class="form-control" value="{{ old('dob', $client->dob) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
