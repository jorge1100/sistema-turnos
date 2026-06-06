<h1>Editar Turno</h1>

form action="{{ route('turnos.update', $turno) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Estado:</label>
    <select name="estado">
        <option value="pendiente" {{ $turno->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
        <option value="en_atencion" {{ $turno->estado == 'en_atencion' ? 'selected' : '' }}>En atención</option>
        <option value="atendido" {{ $turno->estado == 'atendido' ? 'selected' : '' }}>Atendido</option>
        <option value="cancelado" {{ $turno->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
    </select>

    <br><br>

    <button type="submit">Actualizar</button>
</form>