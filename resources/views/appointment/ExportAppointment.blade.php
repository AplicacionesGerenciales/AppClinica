<table>
    <thead>

        <tr>
		<th>Fecha</th>
		<th>Comentario</th>
		<th>ID paciente</th>
		<th>ID Doctor</th>
		<th>ID estado cita</th>
		<th>opciones</th>

        </tr>
    </thead>

    <tbody>
        @foreach ($appointments as $appointment)
            <tr>
    			<td>{{ $appointment->date }}</td>
			<td>{{ $appointment->comment }}</td>
			<td>{{ $appointment->patient_id }}</td>
			<td>{{ $appointment->doctor_id }}</td>
			<td>{{ $appointment->appointment_status_id }}</td>
            </tr>
        @endforeach
    </tbody>
</table>