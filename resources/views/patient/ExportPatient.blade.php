<table>
    <thead>

        <tr>
            <th>Id</th>
            <th>Name</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($patients as $patient)
            <tr>
                <td>{{$patient->id}}</td>
                <td>{{$patient->name}}</td>
            </tr>
        @endforeach
    </tbody>
</table>