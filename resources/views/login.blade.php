<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Iniciar sesión</h1>
    <form method="POST" action="/ingreso">
        @csrf
        <label for="correo">Correo:</label>
        <input type="email" name="correo" required><br>

        <label for="clave">Clave:</label>
        <input type="password" name="clave" required><br>

        <button type="submit">Ingresar</button>
    </form>
</body>
</html>



