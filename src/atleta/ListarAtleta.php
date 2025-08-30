<?php
    require_once "../../class/Atleta.php";

    //devuelve la info de la DBB
    $atletas=Atleta::listarAtletasActivos();

    echo "<table>
            <tr>
                <th>Atleta</th>
                <th>Categoría</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>";
    
    //valida que el arreglo este lleno
    if (!empty($atletas)) {

        for ($i=0; $i <count($atletas); $i++) { 
            
            echo "<tr>
                    <th>".$atletas[$i]['Nombre1']." ".$atletas[$i]['Apellido1']."</th>
                    <th>".$atletas[$i]['Categoria']."</th>
                    <th>".$atletas[$i]['estatus']."</th>
                    <th><br><a href='../../public/EditarAteltaForm.php?ID_Atleta=".$atletas[$i]['ID_Atleta'] ."'> Editar</a> - <a href='EliminarAtleta.php?CODA=".$atletas[$i]['CODA']."&CI=".$atletas[$i]['CI']. "'> Borrar</a></th>
                </tr>";
        }
        
    }else{
        echo "no hay atletas inscritos";
    }

     echo "</table>";

?>