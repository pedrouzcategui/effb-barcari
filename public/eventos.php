<?php
require_once '../class/DTO.php';

$categorias = DTO::ListarCategorias();
$tipos_evento = DTO::ListarTiposEvento();
$horarios = DTO::ListarHorarios();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Eventos</title>
    <link rel="icon" href="assets/img/BarcariLogo-WB.png" type="image/x-icon">
    <style>
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
            background-color: #4b4c4d;
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

        /* Dropdown */
        .dropdown { position: relative; display: inline-block; }
        .dropdown button {
            background-color: #3b3b3b;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .dropdown button:hover { background-color: #535455; }
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

        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }
        .btn-submit {
            display: inline-block;
            padding: 10px 20px;
            background-color: #0f5658;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }
        .btn-submit:hover { background-color: #31666d; }
    </style>
</head>
<body>

<!-- Header -->
<div class="header">
    <div class="dropdown">
        <button>☰ </button>
        <div class="dropdown-content">
            <a href="dashboard_del.php">🏠 Inicio</a>
            <a href="calendario.php">📅 Calendario</a>
            <a href="#">⚙️ Configuración</a>
            <a href="../logout.php">🚪 Cerrar Sesión</a>
        </div>
    </div>
    <h2>Gestión de Eventos</h2>
</div>

<div class="container">
    <h3>Agregar Nuevo Evento</h3>
    <form action="../src/evento/add_event.php" method="POST">
        <div class="form-group">
            <label for="ID_Categoria">Categoría</label>
            <select name="ID_Categoria" id="ID_Categoria" required>
                <option value="">Seleccione una categoría</option>
                <?php if ($categorias): ?>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= htmlspecialchars($categoria['ID_Categoria']) ?>"><?= htmlspecialchars($categoria['Categoria']) ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="ID_Tipo">Tipo de Evento</label>
            <select name="ID_Tipo" id="ID_Tipo" required>
                <option value="">Seleccione un tipo</option>
                <?php if ($tipos_evento): ?>
                    <?php foreach ($tipos_evento as $tipo): ?>
                        <option value="<?= htmlspecialchars($tipo['ID_Tipo']) ?>"><?= htmlspecialchars($tipo['Tipo']) ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="Fecha">Fecha</label>
            <input type="date" name="Fecha" id="Fecha" required>
        </div>
        <div class="form-group">
            <label for="ID_Horario">Horario</label>
            <select name="ID_Horario" id="ID_Horario" required>
                <option value="">Seleccione un horario</option>
                <?php if ($horarios): ?>
                    <?php foreach ($horarios as $horario): ?>
                        <option value="<?= htmlspecialchars($horario['ID_Horario']) ?>"><?= htmlspecialchars($horario['Horario_inicio'] . ' - ' . $horario['Hora_cierre'] . ' (' . $horario['Dias'] . ')') ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="Disciplina">Disciplina</label>
            <input type="text" name="Disciplina" id="Disciplina" required>
        </div>
        <div class="form-group">
            <label for="Descripcion">Descripción</label>
            <textarea name="Descripcion" id="Descripcion" required></textarea>
        </div>
        <button type="submit" class="btn-submit">Agregar Evento</button>
    </form>
</div>

</body>
</html>
