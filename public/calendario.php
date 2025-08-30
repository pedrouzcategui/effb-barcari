<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='utf-8' />
    <title>Calendario de Eventos</title>
    <link rel="icon" href="assets/img/BarcariLogo-WB.png" type="image/x-icon">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
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

        #calendar {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 10px;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: '../src/calendario/get_events.php'
            });
            calendar.render();
        });
    </script>
</head>
<body>

<!-- Header -->
<div class="header">
    <div class="dropdown">
        <button>☰ </button>
        <div class="dropdown-content">
            <a href="dashboard_del.php">🏠 Inicio</a>
            <a href="eventos.php">📅 Eventos</a>
            <a href="#">⚙️ Configuración</a>
            <a href="../logout.php">🚪 Cerrar Sesión</a>
        </div>
    </div>
    <h2>Calendario de Eventos</h2>
</div>

<div id='calendar'></div>

</body>
</html>
