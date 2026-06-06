<h1>Crear Servicio</h1>

<form action="{{ route('servicios.store') }}" method="POST">
    @csrf

    <label>Nombre:</label>
    <input type="text" name="nombre">

    <label>Descripción:</label>
    <input type="text" name="descripcion">

    <button type="submit">Guardar</button>
</form>