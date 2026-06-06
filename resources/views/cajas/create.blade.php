<h1>Crear Caja</h1>

<form action="{{ route('cajas.store') }}" method="POST">
    @csrf

    <label>Nombre:</label>
    <input type="text" name="nombre">

    <button type="submit">Guardar</button>
</form>