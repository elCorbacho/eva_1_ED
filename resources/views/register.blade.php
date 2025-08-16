<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h1>Registrarse</h1>
    <form method="POST" action="/registro">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" required><br>

        <label for="clave">Clave:</label>
        <input type="password" name="clave" required><br>

        <button type="submit">Registrarse</button>
    </form>
</body>
</html>