<?php
require_once "../class/Conex.php";

$conexion = new Conexion();

$sql = "SELECT a.ID_Atleta, a.CI, a.ID_Categoria, a.Grado_instruccion, a.Solvencia, a.Colegio, a.Estatus
        FROM atleta a, persona p 
        WHERE a.CI = p.CI AND a.Estatus='Activo' 
        ORDER BY p.Apellido1, p.Nombre1";

$resultado = $conexion->conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Atletas</title>
<link rel="stylesheet" href="CSS/all.css"> <!-- Iconos Font Awesome local -->
    <link rel="icon" href="assets/img/BarcariLogo-WB.png" type="image/x-icon">

<style>
    @font-face {
        font-family: 'IconFont';
        src: url('../fonts/iconfont.woff2') format('woff2'),
             url('../fonts/iconfont.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding-top: 80px; /* espacio para el header fijo */
    }

    /* Header fijo */
    .header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #4b4c4dff;
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        z-index: 800;
    }
    .header h2 {
        margin: 0;
        font-size: 20px;
        text-align: center;
        flex: 1;
    }

    /* Botones */
    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #0f5658ff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: 0.2s;
        margin-right: 0px;
        margin-left: 1150px;
    }
    .btn:hover { background-color: #31666dff; }

  /* Celda que contiene los botones */
td:last-child {
    display: flex;            /* activa flexbox */
    justify-content: center;  /* centra horizontalmente */
    align-items: center;      /* centra verticalmente */
    gap: 5px;                 /* espacio entre botones */
}

/* Botones de icono */
.btn-icon {
    font-family: 'IconFont', sans-serif;
    font-size: 16px;
    padding: 6px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    color: #fff;
    text-decoration: none;
    display: inline-block;
    margin: 0; /* se usa gap del flex */
}

    .btn-edit { background-color: #40678dff; }
    .btn-edit:hover { background-color: #284358ff; }
    .btn-delete { background-color: #682e2bff; }
    .btn-delete:hover { background-color: #461410ff; }

    /* Dropdown */
    .dropdown { position: relative; display: inline-block; }
    .dropdown button {
        background-color: #3b3b3bff;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .dropdown button:hover { background-color: #535455ff; }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 180px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        border-radius: 5px;
        z-index: 1000;
    }
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        border-bottom: 1px solid #ddd;
    }
    .dropdown-content a:last-child { border-bottom: none; }
    .dropdown-content a:hover { background-color: #ddd; }
    .dropdown:hover .dropdown-content { display: block; }

    /* Tabla */
    table {
        width: 90%;
        border-collapse: collapse;
        margin-top: 20px;
        margin-left: 70px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    th, td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: left;
        vertical-align: middle;
    }
    th { background-color: #565756; color: white; }
    tr:nth-child(even) { background-color: #faf3f3ff; }
    tr:hover { background-color: #e0f7fa; }
    td .btn-icon { margin: 0 3px; }
</style>
</head>
<body>

<!-- Header -->
<div class="header">
    <div class="dropdown">
        <button>☰ </button>
        <div class="dropdown-content">
            <a href="dashboard_del.php">🏠 Inicio</a>
            <a href="#">📅 Eventos</a>
            <a href="#">⚙️ Configuración</a>
            <a href="../logout.php">🚪 Cerrar Sesión</a>
        </div>
    </div>
    <h2>Lista de Atletas Activos</h2>
    
</div>
<a href="atletas_form.php" class="btn">Agregar Atleta</a>
<!-- Tabla -->
<table>
    <thead>
        <tr>
            <th>ID Atleta</th>
            <th>CI</th>
            <th>ID Categoría</th>
            <th>Grado de Instrucción</th>
            <th>Solvencia</th>
            <th>Colegio</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if($resultado && $resultado->num_rows > 0): ?>
            <?php while($atleta = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($atleta['ID_Atleta']) ?></td>
                <td><?= htmlspecialchars($atleta['CI']) ?></td>
                <td><?= htmlspecialchars($atleta['ID_Categoria']) ?></td>
                <td><?= htmlspecialchars($atleta['Grado_instruccion']) ?></td>
                <td><?= htmlspecialchars($atleta['Solvencia']) ?></td>
                <td><?= htmlspecialchars($atleta['Colegio']) ?></td>
                <td><?= htmlspecialchars($atleta['Estatus']) ?></td>
                <td>
                    <a href="EditarAtletaForm.php?ID_Atleta=<?= $atleta['ID_Atleta'] ?>" class="btn-icon btn-edit" title="Editar">✎</a>
                    <a href="../src/atleta/EliminarAtleta.php?ID_Atleta=<?= $atleta['ID_Atleta'] ?>" class="btn-icon btn-delete" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este atleta?');">🗑</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" style="text-align:center;">No hay atletas activos registrados</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
