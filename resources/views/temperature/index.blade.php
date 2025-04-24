<html>
<head>
    <style>
        tr {
            background-color: #ffffff;
            transition: background-color 0.2s;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
            vertical-align: middle;
        }
        
        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
            text-decoration: none;
        }
        
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }
        
        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
        
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        
        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
        
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        
        form {
            display: inline;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    @foreach($records as $record)
    <tr>
        <td>{{ $record->temperature }}</td>
        <td>{{ $record->humidity }}</td>
        <td>{{ $record->recorded_at }}</td>
        <td>
            <a href="{{ route('temperature.edit', $record->id) }}" class="btn btn-sm btn-primary">Edit</a>
            
            <form action="{{ route('temperature.destroy', $record->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger"
                    onclick="return confirm('Are you sure you want to delete this record?')">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</body>
</html> 