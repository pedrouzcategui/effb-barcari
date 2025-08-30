<?php
header('Content-Type: application/json');
require_once '../../class/Conex.php';
require_once '../../class/DTO.php';
require_once '../../class/Evento.php';
require_once '../../class/Persona.php';

$evento = new Evento();
$persona = new Persona();

$events = array();

// Obtener eventos
$all_events = $evento->listar();
if (is_array($all_events)) {
    foreach ($all_events as $ev) {
        $color = '#007bff'; // Color por defecto para eventos
        if ($ev['ID_Tipo'] == 1) { // Torneo
            $color = '#28a745';
        } else if ($ev['ID_Tipo'] == 2) { // Exhibición
            $color = '#ffc107';
        }

        $events[] = array(
            'title' => $ev['Disciplina'],
            'start' => $ev['Fecha'],
            'description' => $ev['Descripcion'],
            'color' => $color
        );
    }
}

// Obtener cumpleaños de atletas
$atletas = $persona->listarAtletas();
if (is_array($atletas)) {
    $current_year = date('Y');
    $next_year = $current_year + 1;
    foreach ($atletas as $atleta) {
        $birthday_month_day = date('m-d', strtotime($atleta['Fecha_Nac']));
        // Evento para el año actual
        $events[] = array(
            'title' => 'Cumpleaños ' . $atleta['Nombre1'] . ' ' . $atleta['Apellido1'],
            'start' => $current_year . '-' . $birthday_month_day,
            'color' => '#dc3545' // Color para cumpleaños
        );
        // Evento para el proximo año
        $events[] = array(
            'title' => 'Cumpleaños ' . $atleta['Nombre1'] . ' ' . $atleta['Apellido1'],
            'start' => $next_year . '-' . $birthday_month_day,
            'color' => '#dc3545' // Color para cumpleaños
        );
    }
}

echo json_encode($events);
?>
