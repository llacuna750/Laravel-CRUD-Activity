@extends('layout')

@section('content')
    <h2>Add New Client</h2>

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

    <form method="POST" action="{{ route('clients.store') }}">
        @csrf

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label>Address:</label>
            <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
        </div>

        <div class="mb-3">
            <label>Gender:</label>
            <select name="gender" class="form-select" required>
                <option value="">Select</option>
                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Date of Birth:</label>
            <input type="date" name="dob" class="form-control" value="{{ old('dob') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
