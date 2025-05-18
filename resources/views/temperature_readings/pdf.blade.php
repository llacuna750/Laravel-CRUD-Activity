<!DOCTYPE html>
<html>

<head>
    <title>Temperature Report</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Temperature Readings Report</h2>

    <table>
        <thead>
            <tr>
                <th>Room</th>
                <th>Device</th>
                <th>Temperature</th>
                <th>Recorded At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($readings as $r)
            <tr>
                <td>{{ $r->room->name }}</td>
                <td>{{ $r->device->name }}</td>
                <td>{{ $r->temperature }}</td>
                <td>{{ $r->created_at->format('Y-m-d H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>