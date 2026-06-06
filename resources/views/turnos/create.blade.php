<h1>Crear Turno</h1>

<form action="{{ route('turnos.store') }}" method="POST">
    @csrf

    <label>Servicio:</label>
    <select name="servicio_id">
        @foreach($servicios as $servicio)
            <option value="{{ $servicio->id }}">
                {{ $servicio->nombre }}
            </option>
        @endforeach
    </select>

    <br><br>

    <button type="submit">Guardar</button>
</form>