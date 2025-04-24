<table>
    <thead>
        <tr>
            <th>Temperature</th>
            <th>Humidity</th>
            <th>Recorded At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
            <tr>
                <td>{{ $record->temperature }}</td>
                <td>{{ $record->humidity }}</td>
                <td>{{ $record->recorded_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
