<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contacto</title>
</head>
<body>

    <h2>Nuevo mensaje desde el formulario de contacto</h2>

    <p><strong>Nombre:</strong> {{ $datos['nombre'] }}</p>

    <p><strong>Email:</strong> {{ $datos['email'] }}</p>

    <p><strong>Mensaje:</strong></p>

    <p>{{ $datos['mensaje'] }}</p>

</body>
</html>