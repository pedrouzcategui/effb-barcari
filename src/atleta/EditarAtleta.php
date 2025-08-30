<?php 
//obtiene los valores del formulario
require_once "../../class/Atleta.php";
require_once "../../class/Representante.php";

//obtiene los valores del formulario
$ID_Atleta=$_POST['ID_Atleta'];
$Nombre1=$_POST['Nombre1'];
$Nombre2=$_POST['Nombre2'];
$Apellido1=$_POST['Apellido1'];
$Apellido2=$_POST['Apellido2'];
$Cedula=$_POST['nacionalidad'].$_POST['CI'];
$FechaNac=$_POST['Fecha'];
$Colegio=$_POST['Colegio'];
$Grado=$_POST['Grado_instruccion'];
$Categoria=$_POST['Categoria'];
$Solvencia=$_POST['Solvencia'];
$Estatus='Activo'; //si se esta editando es porque el atleta esta activo

//instancia de atleta
$Atleta=new Atleta($Cedula, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $FechaNac,0, "", "", null, $ID_Atleta, "$Categoria", $Grado, $Solvencia, $Colegio, $Estatus);


$Atleta->ActualizarDatosAtleta();

header("Location: ../../public/EditarAtletaForm.php?ID_Atleta=$ID_Atleta");

?>