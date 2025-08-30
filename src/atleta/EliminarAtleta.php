<?php
    require_once "../../class/Atleta.php";
    require_once "../../class/Representante.php"; 

    $CODA = $_GET['CODA'];
    $CI = $_GET['CI'];
    //($Cedula, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $FechaNac, $Telefono, $Direccion, $Correo, $CODA, $ID_Atleta, $Categoria, $Grado_instruccion, $Solvencia, $Colegio, $Estatus)
    $Atleta=new Atleta($CI, "", "", "", "", 0, 0, "", "", $CODA, 0, 0, 0, 0, 0, "");

    if($Atleta->CambiarEstatus("Inactivo")){
        echo "cambio de estatus exitoso";
    }else{
        echo "Error en el cambio de estatus";
    }

    echo "<br><a href='ListarAtleta.php'> Volver a la tabla</a>";
