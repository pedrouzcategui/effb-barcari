<?php
require_once '../../class/DTO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar y sanitizar los datos de entrada
    $ID_Categoria = filter_input(INPUT_POST, 'ID_Categoria', FILTER_VALIDATE_INT);
    $ID_Tipo = filter_input(INPUT_POST, 'ID_Tipo', FILTER_VALIDATE_INT);
    $Fecha = filter_input(INPUT_POST, 'Fecha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $ID_Horario = filter_input(INPUT_POST, 'ID_Horario', FILTER_VALIDATE_INT);
    $Disciplina = filter_input(INPUT_POST, 'Disciplina', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $Descripcion = filter_input(INPUT_POST, 'Descripcion', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Verificar que los datos requeridos no estén vacíos
    if ($ID_Categoria && $ID_Tipo && $Fecha && $ID_Horario && $Disciplina && $Descripcion) {
        $success = DTO::RegistrarEvento($ID_Categoria, $ID_Tipo, $Fecha, $ID_Horario, $Disciplina, $Descripcion);

        if ($success) {
            // Redirigir al calendario si el evento se agregó correctamente
            header('Location: ../../public/calendario.php');
            exit;
        } else {
            // Manejar el error de inserción
            echo "Error al agregar el evento.";
        }
    } else {
        // Manejar datos inválidos o faltantes
        echo "Por favor, complete todos los campos requeridos.";
    }
} else {
    // Redirigir si no es una solicitud POST
    header('Location: ../../public/eventos.php');
    exit;
}
?>
