<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistema de Turnos</title>
</head>

<body style="margin:0; background:#ecfdf5; font-family:Arial, Helvetica, sans-serif;">

    <div style="display:flex; justify-content:center; align-items:center; height:100vh;">

        <div style="
            background:white;
            padding:40px;
            border-radius:15px;
            box-shadow:0 10px 25px rgba(0,0,0,0.1);
            width:360px;
            text-align:center;
        ">

            <!-- ✅ TÍTULO -->
            <h2 style="margin-bottom:10px; color:#065f46;">
                Sistema de Turnos
            </h2>

            <p style="color:#6b7280; margin-bottom:25px;">
                Iniciar sesión
            </p>

            <!-- ✅ MENSAJES -->
            @if(session('error'))
                <div style="
                    background:#fee2e2;
                    color:#b91c1c;
                    padding:10px;
                    border-radius:5px;
                    margin-bottom:10px;
                ">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div style="
                    background:#d1fae5;
                    color:#065f46;
                    padding:10px;
                    border-radius:5px;
                    margin-bottom:10px;
                ">
                    {{ session('success') }}
                </div>
            @endif

            <!-- ✅ FORM -->
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <!-- ✅ EMAIL -->
                <div style="margin-bottom:15px; text-align:left;">
                    <label style="font-size:14px; color:#374151;">Email</label>
                    <input type="email" name="email" required
                        style="
                            width:100%;
                            padding:10px;
                            border-radius:8px;
                            border:1px solid #d1d5db;
                            margin-top:5px;
                        ">
                </div>

                <!-- ✅ PASSWORD -->
                <div style="margin-bottom:20px; text-align:left;">
                    <label style="font-size:14px; color:#374151;">Contraseña</label>
                    <input type="password" name="password" required
                        style="
                            width:100%;
                            padding:10px;
                            border-radius:8px;
                            border:1px solid #d1d5db;
                            margin-top:5px;
                        ">
                </div>

                <!-- ✅ BOTÓN -->
                <button type="submit"
                    style="
                        width:100%;
                        background:#10b981;
                        color:white;
                        padding:12px;
                        border:none;
                        border-radius:8px;
                        font-weight:bold;
                        cursor:pointer;
                        transition:0.3s;
                    "
                    onmouseover="this.style.background='#059669'"
                    onmouseout="this.style.background='#10b981'">
                    Ingresar
                </button>

            </form>

            <!-- ✅ REGISTRO -->
            <p style="margin-top:15px; color:#6b7280;">
                ¿No tienes cuenta?
            </p>

            <a href="{{ route('register') }}"
               style="color:#10b981; font-weight:bold; text-decoration:none;">
                Registrarse
            </a>

        </div>

    </div>

</body>
</html>