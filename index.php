<?php 
session_start();

// Si ya hay sesión iniciada, redirige al rol correspondiente
if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {
        case 'administrador':
            header("Location: admin.php");
            exit;
        case 'delegada':
            header("Location: delegada.php");
            exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="public/assets/css/index.css">
    <link rel="stylesheet" href="CSS/all.css"> <!-- Iconos Font Awesome local -->
    <link rel="icon" href="public/assets/img/BarcariLogo-WB.png" type="image/x-icon">

    
</head>
<body>
    <div class="login-wrapper">
       <!-- Panel izquierdo -->
<div class="login-left">
    <img src="public/assets/img/BarcariLogo-WB.png" alt="" class="logo">
    <h2 class="brand-text"></h2>
</div>



        <!-- Panel derecho -->
        <div class="login-right">
    <!-- Título principal de la sección -->
   <h1 style="text-align: center;">Bienvenido al Sistema</h1>
 
    <!-- Subtítulo del formulario -->
    <h3 style="text-align: center;">Inicie Sesión</h3>
    
    <form method="POST" action="src/login/procesar_login.php">
        <!-- Grupo de entrada para el usuario -->
        <div class="input-group">
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario" placeholder="Ingrese su usuario" required>
        </div>
        
        <!-- Grupo de entrada para la contraseña -->
        <div class="input-group">
            <label for="clave">Contraseña</label>
            <input type="password" id="clave" name="clave" placeholder="Ingrese su contraseña" required>
        </div>
        
        <!-- Botón de envío -->
        <button type="submit" class="btn">Ingresar</button>
        
        <!-- Enlace para recuperar o cambiar la contraseña -->
        <div class="forgot">
            <a href="cambiar_clave.php" >¿Olvidó su contraseña?</a>
        </div>
    </form>
</div>

    </div>
</body>
</html>
