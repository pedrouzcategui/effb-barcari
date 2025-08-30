<?php
session_start();

// Si ya hay sesión iniciada, redirijo al rol correspondiente
if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] === 'administrador') {
        header("Location: admin.php");
        exit();
    } elseif ($_SESSION['rol'] === 'delegada') {
        header("Location: delegada.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2 class="title">Login</h2>
        <form method="POST" action="../src/login/procesar_login.php" class="form-box">
            <input type="text" name="usuario" placeholder="Usuario" class="input-field" required>
            <input type="password" name="clave" placeholder="Contraseña" class="input-field" required>
            <button type="submit" class="btn">Ingresar</button>
        </form>
    </div>
</body>
</html>
