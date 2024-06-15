<table>
    <thead>
        <tr>
            <th>Name</th>
            <!-- Add more columns as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <!-- Add more columns as needed -->
            </tr>
        @endforeach
    </tbody>
</table>