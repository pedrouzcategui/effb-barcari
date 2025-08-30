<?php
session_start();
require_once "../../class/Usuario.php";   // desde src/login subimos dos niveles a la raíz
require_once "../../class/DTO.php";       // desde src/login subimos dos niveles a la raíz

$Usuario = new Usuario($_POST['usuario'], $_POST['clave']);
$Usuario->to_String();

$datos = $Usuario->iniciarSesion();

if ($datos && isset($datos['Rol'])) {
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['rol'] = $datos['Rol'];

    if ($datos['Rol'] === 'admin') {
        header('Location: ../../public/dashboard_admin.php');
        exit();
    } elseif ($datos['Rol'] === 'delegado') {
        header('Location: ../../public/dashboard_del.php');
        exit();
    } else {
        echo "No autorizado";
    }
} else {
    echo "<p>Usuario o contraseña incorrectos</p>";
    echo "<a href='../../index.php'>Volver al login</a>";
}
?>
