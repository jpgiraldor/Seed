<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>brand</th>
    </tr>
    </thead>
    <tbody>
    @foreach($seeds as $seed)
        <tr>
            <td>{{ $seed->name }}</td>
            <td>{{ $seed->brand }}</td>
        </tr>
    @endforeach
    </tbody>
</table>