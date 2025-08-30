<?php
	require_once 'Conex.php';

	class DTO{	

		//_______________________________________________________________________
        //________________________ LOGIN ________________________________________
		//verifica las credenciales de un usuario
		public static function loginDTO($usuario, $clave){
			$conn=new Conexion();
			$result=$conn->login($usuario, $clave);
			$conn->cerrar();
			return $result->fetch_assoc();
		}



		//_______________________________________________________________________
        //________________________ PERSONA ______________________________________

		//verificar la existencia de una persona
		public static function VerificarExistenciaPersona($CI){
			$conn=new Conexion();
			
			$result=$conn->VerificarExistenciaPersona($CI);

			$conn->cerrar();
			
			if ($result->num_rows > 0) return true;
        	 else return false;
		}

		// registra a una persona
		public static function RegistrarPersona($Cedula, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $FechaNac){
			$conn=new Conexion();

			return $conn->RegistrarPersona($Cedula, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $FechaNac);

			$conn->cerrar();
		}

		//registrar la informacion de contacto 
		public static function RegistrarContactoPersona($Cedula, $Telefono, $Correo, $Direccion){
			$conn=new Conexion();

			return $conn->RegistrarContactoPersona($Cedula, $Telefono, $Correo, $Direccion);

			$conn->cerrar();
		}

		//_______________________________________________________________________
        //________________________ ATLETA _______________________________________

		//verificar la existencia
		public static function VerificarExistenciaAtleta($CI){
			$conn=new Conexion();
			$result=$conn->VerificarExistenciaAtlteta($CI);
			$conn->cerrar();
			
			if ($result->num_rows > 0) return true;
        	else return false;
		}
		//verifica el estatus del atleta
		public function VerificarEstatusAtleta($CI){
			$conn=new Conexion();
			$result=$conn->VerificarEstatusAtlteta($CI);
			$conn->cerrar();
			
			if ($result->num_rows > 0) {
				$id = $result->fetch_assoc();
				return $id['ID_Atleta'];
			} else return 0;
		}
		//devuelve el estatus del atleta
		public static function ultimo_ID_Atleta(){
			$conn=new Conexion();
			$result = $conn->ultimo_id_atleta();
			$conn->cerrar();

			if ($result->num_rows > 0) {
				$id = $result->fetch_assoc();
				return $id['ID_Atleta'];
			} else return 0;
		}
		//registrar un atleta
		public static function RegistrarAtlta($CODA, $ID_Atleta, $CI, $Categoria, $Grado_instruccion, $Solvencia, $Colegio, $Estatus){
			$conn=new Conexion();

			return $conn->RegistrarAtlta($CODA, $ID_Atleta, $CI, $Categoria, $Grado_instruccion, $Solvencia, $Colegio, $Estatus);

			$conn->cerrar();
		}
		//Cambia el estatus de un atleta
		public static function CambiarEstatusAtleta($CI, $Estatus){
			$conn=new Conexion();
			//registra el contacto de una persona
        	return $conn->CambiarEstatusAtleta($CI, $Estatus);
			$conn->cerrar();
		}
		//devuelve una lista de los atletas activos
		public static function AtletasActivos(){
			$conn=new Conexion();
			
			$result=$conn->AtletasActivos();

			if ($result->num_rows > 0) {
				while ($linea = $result->fetch_assoc()) {
					$Atletas[] = $linea;
				}
				
				$conn->cerrar();
				return $Atletas;
        	} else return 0;
		}
		//devuelve las categorias de los equipos
		public static function Categorias(){
			$conn=new Conexion();
			
			$result=$conn->Info_Categorias();

			if ($result->num_rows > 0) {
				while ($linea = $result->fetch_assoc()) {
					$categoria[] = $linea;
				}

				$conn->cerrar();
				return $categoria;
        	} else return 0;
		}

		//devuelve todos los datos de un atleta
		public static function DatosAtletaCompleto($ID_Atleta){
			$conn=new Conexion();
			
			$result=$conn->DatosAtletaCompleto($ID_Atleta);

			if ($result->num_rows > 0) {
				while ($linea = $result->fetch_assoc()) {
					$Atleta[] = $linea;
				}
				
				$conn->cerrar();
				return $Atleta;
			} else return 0;
		}

		//actualiza los datos de un atleta
		
		public static function ActualizarDatosAtleta($ID_Atleta, $Cedula, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $FechaNac, $Categoria, $Grado_instruccion, $Solvencia, $Colegio, $Estatus) {
			$conn=new Conexion();
			
			return $conn->ActualizarDatosAtleta($ID_Atleta, $Cedula, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $FechaNac, $Categoria, $Grado_instruccion, $Solvencia, $Colegio, $Estatus);

			$conn->cerrar();
		}



		//_______________________________________________________________________
        //_______________________ REPRESENTANTE _________________________________
		
		//devuelve el estatus del representante
		public static function ultimo_ID_Representante(){
			$conn=new Conexion();

			$result = $conn->ultimo_id_representante();

			//cierra la session
			$conn->cerrar();

			if ($result->num_rows > 0) {
				$id = $result->fetch_assoc();
				return $id['ID_Representante'];
			} else return 0;
		}
		//verifica si existe el representante existe para ese atleta
		public static function VerificarExistenciaRepresentante($CI, $Atleta){
			$conn=new Conexion();
			$result=$conn->VerificarExistenciaRepresentante($CI, $Atleta);
			$conn->cerrar();
			
			if ($result->num_rows > 0) return true;
        	else return false;
		}

		//registrar un representante
		public static function RegistrarRepresentante($CODR, $ID_Representante, $ID_Atleta, $Cedula, $Parentesco, $Estatus){
			$conn=new Conexion();

			return $conn->RegistrarRepresentante($CODR, $ID_Representante, $ID_Atleta, $Cedula, $Parentesco, $Estatus);

			$conn->cerrar();
		}

		//_______________________________________________________________________
		//_________________________ EVENTO ______________________________________

		//devuelve una lista de los eventos
		public static function ListarEventos(){
			$conn=new Conexion();

			$result=$conn->ListarEventos();

			if ($result->num_rows > 0) {
				while ($linea = $result->fetch_assoc()) {
					$Eventos[] = $linea;
				}

				$conn->cerrar();
				return $Eventos;
			} else return 0;
		}

		public static function ListarAtletas(){
			$conn=new Conexion();

			$result=$conn->ListarAtletas();

			if ($result->num_rows > 0) {
				while ($linea = $result->fetch_assoc()) {
					$Atletas[] = $linea;
				}

				$conn->cerrar();
				return $Atletas;
			} else return 0;
		}

		//devuelve una lista de las categorias
		public static function ListarCategorias(){
			$conn=new Conexion();

			$result=$conn->ListarCategorias();

			if ($result->num_rows > 0) {
				while ($linea = $result->fetch_assoc()) {
					$Categorias[] = $linea;
				}

				$conn->cerrar();
				return $Categorias;
			} else return 0;
		}

		//devuelve una lista de los tipos de evento
		public static function ListarTiposEvento(){
			$conn=new Conexion();

			$result=$conn->ListarTiposEvento();

			if ($result->num_rows > 0) {
				while ($linea = $result->fetch_assoc()) {
					$TiposEvento[] = $linea;
				}

				$conn->cerrar();
				return $TiposEvento;
			} else return 0;
		}

		//devuelve una lista de los horarios
		public static function ListarHorarios(){
			$conn=new Conexion();

			$result=$conn->ListarHorarios();

			if ($result->num_rows > 0) {
				while ($linea = $result->fetch_assoc()) {
					$Horarios[] = $linea;
				}

				$conn->cerrar();
				return $Horarios;
			} else return 0;
		}

		//registra un evento
		public static function RegistrarEvento($ID_Categoria, $ID_Tipo, $Fecha, $ID_Horario, $Disciplina, $Descripcion){
			$conn=new Conexion();
			return $conn->RegistrarEvento($ID_Categoria, $ID_Tipo, $Fecha, $ID_Horario, $Disciplina, $Descripcion);
			$conn->cerrar();
		}
    }
    ?>