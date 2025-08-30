<?php

// Genera el siguiente ID basado en el código existente o inicia en 10001 si no hay número previo
function generar_id($codigo)
{
    // Verificamos si el código contiene el guión "-"
    if (strpos($codigo, "-") !== false) {
        // Separamos la letra y el número
        $id = explode("-", $codigo);
        // Sumamos 1 al número
        $numero = (int)$id[1] + 1;
        return $id[0] . "-" . $numero;
    } else {
        // Si no tiene número, generamos el primero como 10001
        return $codigo . "-10001";
    }
}
