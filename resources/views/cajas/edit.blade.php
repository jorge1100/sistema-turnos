<h1>Editar Caja</h1>

<form action="{{ route('cajas.update', $caja) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nombre" value="{{ $caja->nombre }}">

    <select name="estado">
        <option value="1">Activa</option>
        <option value="0">Inactiva</option>
    </select>

    <button>Actualizar</button>
</form>