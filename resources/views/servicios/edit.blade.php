<h1>Editar Servicio</h1>

<form action="{{ route('servicios.update', $servicio) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nombre" value="{{ $servicio->nombre }}">
    <input type="text" name="descripcion" value="{{ $servicio->descripcion }}">

    <button type="submit">Actualizar</button>
</form>