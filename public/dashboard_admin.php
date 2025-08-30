<?php 
// Aquí podrías validar sesión del delegado y cargar datos de la BD
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Delegado</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
        }
        /* Sidebar */
        .sidebar {
            width: 220px;
            background: #1e1e2f;
            color: #fff;
            padding: 20px;
        }
        .sidebar h2 {
            margin-bottom: 20px;
            font-size: 20px;
            text-align: center;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 8px;
        }
        .sidebar a:hover {
            background: #343450;
        }
        /* Main */
        .main {
            flex: 1;
            background: #f4f6fa;
            padding: 20px;
            overflow-y: auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .header h1 {
            font-size: 24px;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(200px,1fr));
            gap: 20px;
        }
        .card {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            text-align: center;
        }
        .card h3 {
            margin: 0;
            font-size: 18px;
            color: #555;
        }
        .card p {
            font-size: 22px;
            font-weight: bold;
            margin: 10px 0 0;
            color: #222;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Delegado</h2>
        <a href="#">🏠 Inicio</a>
        <a href="#">👥 Atletas</a>
        <a href="#">📅 Eventos</a>
        <a href="#">✅ Asistencias</a>
        <a href="#">💰 Mensualidades</a>
        <a href="#">⚙️ Configuración</a>
        <a href="#">🚪 Cerrar Sesión</a>
    </div>

    <!-- Main -->
    <div class="main">
        <div class="header">
            <h1>Dashboard Delegado</h1>
            <span>Bienvenido, Delegado</span>
        </div>

        <!-- Cards con métricas -->
        <div class="cards">
            <div class="card">
                <h3>Total Atletas</h3>
                <p>120</p>
            </div>
            <div class="card">
                <h3>Eventos Activos</h3>
                <p>4</p>
            </div>
            <div class="card">
                <h3>Asistencias Hoy</h3>
                <p>36</p>
            </div>
            <div class="card">
                <h3>Mensualidades Pendientes</h3>
                <p>15</p>
            </div>
        </div>
    </div>

</body>
</html>
