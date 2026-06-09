<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>

<body style="margin:0; background:#ecfdf5; font-family:Arial;">

<div style="display:flex; justify-content:center; align-items:center; height:100vh;">

    <div style="background:white; padding:40px; border-radius:15px; width:350px; text-align:center;">

        <h2>Registro</h2>

        <!-- FORM -->
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <input type="text" name="name" placeholder="Nombre" required
                style="width:100%; padding:10px; margin-bottom:10px;"><br>

            <input type="email" name="email" placeholder="Email" required
                style="width:100%; padding:10px; margin-bottom:10px;"><br>

            <input type="password" name="password" placeholder="Contraseña" required
                style="width:100%; padding:10px; margin-bottom:15px;"><br>

            <button type="submit"
                style="width:100%; background:#10b981; color:white; padding:10px;">
                Crear Cuenta
            </button>

        </form>

    </div>

</div>

</body>
</html>