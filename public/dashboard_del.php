<?php
session_start();

// ============================================
// Validación de sesión: solo delegados
// ============================================
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'delegado') {
    header("Location: ../index.php");
    exit();
}

// ============================================
// Conexión a la base de datos
// ============================================
require_once "../class/Conex.php"; // Clase de conexión
$db = new Conexion();                 // Instancia
$conn = $db->conn;                    // mysqli connection

// ============================================
// Consultas rápidas para las métricas
// ============================================

// Total Atletas
$result = $conn->query("SELECT COUNT(*) as total FROM atleta");
$totalAtletas = $result->fetch_assoc()['total'];

// Total Eventos Activos
$result = $conn->query("SELECT COUNT(*) as total FROM evento WHERE fecha >= CURDATE()");
$totalEventos = $result->fetch_assoc()['total'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Delegado</title>
    <link rel="stylesheet" href="CSS/all.css"> <!-- Iconos Font Awesome local -->
    <link rel="icon" href="assets/img/BarcariLogo-WB.png" type="image/x-icon">

    <style>
        body { margin:0; font-family: Arial, sans-serif; display:flex; height:100vh; }
        .sidebar { width:220px; background:#1e1e2f; color:#fff; padding:20px; }
        .sidebar h2 { text-align:center; margin-bottom:20px; font-size:20px; }
        .sidebar a { display:block; padding:10px; color:#fff; text-decoration:none; border-radius:6px; margin-bottom:8px; transition:0.3s; }
        .sidebar a:hover { background:#343450; }
        .main { flex:1; background:#f4f6fa; padding:20px; overflow-y:auto; }
        .header { display:flex; justify-content:space-between; align-items:center; margin-bottom:30px; }
        .header h1 { font-size:24px; }
        .cards { display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:20px; }
        .card { background:#fff; padding:20px; border-radius:12px; box-shadow:0 2px 6px rgba(0,0,0,0.1); text-align:center; }
        .card h3 { margin:0; font-size:18px; color:#555; }
        .card p { font-size:22px; font-weight:bold; margin:10px 0 0; color:#222; }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Delegado</h2>
        <a href="#">🏠 Inicio</a>
        <a href="../public/atletas.php">👥 Atletas</a>
        <a href="#">📅 Eventos</a>
        <a href="#">⚙️ Configuración</a>
        <a href="../logout.php">🚪 Cerrar Sesión</a>
    </div>

    <!-- Main -->
    <div class="main">
        <div class="header">
            <h1>Dashboard Delegado</h1>
            <span>Bienvenido, <?php echo htmlspecialchars($_SESSION['rol']); ?></span>
        </div>

        <!-- Cards con métricas -->
        <div class="cards">
            <div class="card">
                <h3>Total Atletas</h3>
                <p><?php echo $totalAtletas; ?></p>
            </div>
            <div class="card">
                <h3>Eventos Activos</h3>
                <p><?php echo $totalEventos; ?></p>
            </div>
        </div>
    </div>
</body>
</html>
