<!DOCTYPE html>
<html>
<head>
    <title>Temperature Records</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Temperature Monitoring Report</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Sensor Name</th>
                <th>Temperature (°C)</th>
                <th>Recorded At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($temperatures as $temperature)
            <tr>
                <td>{{ $temperature->id }}</td>
                <td>{{ $temperature->sensor_name }}</td>
                <td>{{ $temperature->temperature }}</td>
                <td>{{ $temperature->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
