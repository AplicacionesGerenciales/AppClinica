<table>
    <thead>

        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Genero</th>
            <th>Targeta de identificacion</th>
            <th>Telefono</th>
            <th>Fecha de nacimiento</th>
            <th>Correo electronico</th>
            <th>Id usuario</th>

        </tr>
    </thead>

    <tbody>
        @foreach ($patients as $patient)
            <tr>
                <td>{{$patient->id}}</td>
                <td>{{$patient->name}}</td>
                <td>{{$patient->surname}}</td>
                <td>{{$patient->age}}</td>
                <td>{{$patient->gender}}</td>
                <td>{{$patient->identification_card}}</td>
                <td>{{$patient->phone}}</td>
                <td>{{$patient->birthdate}}</td>
                <td>{{$patient->address}}</td>
                <td>{{$patient->user_id}}</td>
            </tr>
        @endforeach
    </tbody>
</table>