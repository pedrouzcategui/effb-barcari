<?php
require_once "../../class/Atleta.php";
require_once "../../class/Representante.php";
//ATLETA
$Nombre1 = $_POST['Nombre1'];
$Nombre2 = $_POST['Nombre2'];
$Apellido1 = $_POST['Apellido1'];
$Apellido2 = $_POST['Apellido2'];
$Cedula = $_POST['nacionalidad'] . $_POST['CI'];
$FechaNac = $_POST['Fecha'];
$Colegio = $_POST['Colegio'];
$Grado = $_POST['Grado_instruccion'];
$Categoria = $_POST['Categoria'];
$Solvencia = $_POST['Solvencia'];

//REPRESENTANTE
$NombreR = $_POST['NombreR'];
$ApellidoR = $_POST['ApellidoR'];
$CedulaR = $_POST['CIR'];
$Parentesco = $_POST['Parentesco'];
$Telefono = $_POST['TelefonoR'];
$Correo = $_POST['CorreoR'];
$Direccion = $_POST['DireccionR'];

$Atleta = new Atleta($Cedula, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $FechaNac, 0, "", "", null, "", "$Categoria", $Grado, $Solvencia, $Colegio, "Activo");

$Atleta->ID(); //generar id
$Representante = new Representante($CedulaR, $NombreR, "", $ApellidoR, "", "0000-00-00", $Telefono, $Direccion, $Correo, null, "", $Atleta->getID_Atleta(), $Parentesco, "Activo");

//verificamos si el atleta se encuentre registrado como persona
if (!$Atleta->VerificarExistencia()) {

    //registra una persona
    if ($Atleta->RegistrarPersona()) {

        //registrar un atleta
        if ($Atleta->RegistrarAtleta()) {

            //verifica la existencia de la persona que sera el representante
            if (!$Representante->VerificarExistencia()) {

                //registra el contacto de emergencia 
                if ($Representante->RegistrarPersona() && $Representante->RegistrarContactoPersona() && $Representante->RegistrarRepresentante()) {
                    echo "registro exitoso";
                } else echo "hubo un error al registrar al alteta";

                //en caso de que el representante exista como persona 
            } else {
                //verifica la existencia del representante para el atleta
                if (!$Representante->VerificarExistenciaRepresentante()) {
                    if ($Representante->RegistrarRepresentante()) {
                        echo "registro exitoso";
                    } else echo "hubo un error al registrar al alteta";
                } else echo "registro exitoso";
            }
        }
    } else echo "hubo un error al registrar a la persona";
} else {
    //verifica la existencia el atleta
    if (!$Atleta->VerificarExistenciaAtleta()) {
        //registra una persona
        if ($Atleta->RegistrarPersona()) {

            //registrar un atleta
            if ($Atleta->RegistrarAtleta()) {

                //verifica la existencia de la persona que sera el representante
                if (!$Representante->VerificarExistencia()) {

                    //registra el contacto de emergencia 
                    if ($Representante->RegistrarPersona() && $Representante->RegistrarContactoPersona() && $Representante->RegistrarRepresentante()) {
                        echo "registro exitoso";
                    } else echo "hubo un error al registrar al alteta";

                    //en caso de que el representante exista como persona 
                } else {
                    //verifica la existencia del representante para el atleta
                    if (!$Representante->VerificarExistenciaRepresentante()) {
                        if ($Representante->RegistrarRepresentante()) {
                            echo "registro exitoso";
                        } else echo "hubo un error al registrar al alteta";
                    } else echo "registro exitoso";
                }
            }
        }
        //en caso de que exista
    } else {
        //verifica la el estatus del atleta
        if (!$Atleta->VerificarEstatus()) {

            //cambia el estatus del atleta
            if ($Atleta->CambiarEstatus("Activo")) echo "registro existoso";
        } else echo "el atleta se encuentra inscrito";
    }
}

header("Location: ../../public/atletas.php?ID_Atleta=$ID_Atleta");
