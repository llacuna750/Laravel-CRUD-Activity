@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Customers</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->gender }}</td>
                <td>{{ $customer->dob->format('m/d/Y') }}</td>
                <td>
                    <a href="{{ route('customers.edit', $customer->id) }}">Edit</a>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $customers->links() }}
</div>
@endsection