<?php

	class Conexion {
		private $server="localhost";
		private $user="root";
		private $password="";
		private $BDD="futbol";
		public $conn=null;
		//_______________________________________________________________________
		function __construct($s=null, $u=null, $p=null, $b=null)
		{
			if ($u!=null) $user=$u;
			if ($p!=null) $password=$p;
			if ($s!=null) $server=$s;
			if ($b!=null) $BDD=$b;

			$this->conn=new mysqli($this->server,$this->user, $this->password,  $this->BDD);

			if (!$this->conn) die("ERROS AL CONECTARSE AL SERVIDOR!!!");
		}
		//_______________________________________________________________________
		//valida la conexion
		public function validar(){
			if ($this->conn !=null) echo "CONEXION ESTABLECIDA";
			else echo "ERROR DE CONEXION";
		}
		//cerrar la conexion
		public function cerrar(){
			$this->conn->close();
		}

		//_______________________________________________________________________
        //________________________ LOGIN ________________________________________
		//verifica las credenciales de un usuario
		public function login($usuario, $clave){
			$sql="SELECT * FROM credenciales WHERE Usuario=? and Clave=?;";
			$stmt=$this->conn->prepare($sql); 
			$stmt->bind_param("ss", $usuario, $clave);
			$stmt->execute();
			$result=$stmt->get_result();
			return $result;
			//return $this->conn->query($stmt);
		}

		//_______________________________________________________________________
        //________________________ PERSONA ______________________________________

		//verifica la existencia de una persona
		public function VerificarExistenciaPersona($CI){
			$sql = "SELECT CI FROM persona where CI='$CI';";
			return $this->conn->query($sql);
		}

		//registra a una persona
		public function RegistrarPersona($Cedula, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $FechaNac){
			
			$stmt = $this->conn->prepare("INSERT INTO persona (CI, Nombre1, Nombre2, Apellido1, Apellido2, Fecha_Nac) VALUES (?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("ssssss", $Cedula, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $FechaNac);

			return $stmt->execute();
		}


		//registra la informacion de contacto de una persona 
		public function RegistrarContactoPersona($Cedula, $Telefono, $Correo, $Direccion){

			$stmt = $this->conn->prepare("INSERT INTO contacto (Cedula, Telefono, Correo, Direccion) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("ssss", $Cedula, $Telefono, $Correo, $Direccion);

			return $stmt->execute();
		}

        //_______________________________________________________________________
        //________________________ ATLETA _______________________________________

		//devuelve el ultimo id de la tabla atletas
		public function ultimo_id_atleta(){
			$sql = "SELECT ID_Atleta FROM atleta ORDER BY ID_Atleta DESC LIMIT 1;";
			return $this->conn->query($sql);
		}
		//verifica la existencia de un Atleta
		public function VerificarExistenciaAtlteta($CI){
			$sql = "SELECT CI FROM Atleta where CI='$CI';";
			return $this->conn->query($sql);
		}
		//verifica el estatus de un atleta
		public function VerificarEstatusAtlteta($CI){
			$sql = "SELECT Estatus FROM Atleta where CI='$CI';";
			return $this->conn->query($sql);
		}
		//registrar un atleta
		public function RegistrarAtlta($CODA, $ID_Atleta, $CI, $Categoria, $Grado_instruccion, $Solvencia, $Colegio, $Estatus){
			$foto=0;
			$stmt = $this->conn->prepare("INSERT INTO atleta (ID_Atleta, CI, ID_Categoria, Grado_instruccion,Solvencia, Colegio, Estatus, Foto ) VALUES (?,?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("ssssssss", $ID_Atleta, $CI, $Categoria, $Grado_instruccion, $Solvencia, $Colegio, $Estatus, $foto);

			return $stmt->execute();
		}
		//cambiar estatus
		public function CambiarEstatusAtleta($CI, $Estatus){
			
			$stmt = $this->conn->prepare("UPDATE atleta SET Estatus = '$Estatus' WHERE CI = ?");
			$stmt->bind_param("s", $CI);

			return $stmt->execute();
		}
		//devuelve los atletas activos
		public function AtletasActivos(){
			$sql = "SELECT p.Nombre1, p.Apellido1, c.Categoria, a.estatus, a.CODA,a.ID_Atleta, a.CI FROM persona p, atleta a, categoria c WHERE a.CI=p.CI and a.ID_Categoria=c.ID_Categoria and a.Estatus='Activo';";
			return $this->conn->query($sql);
		}
		//extraer una categoria
		public function Info_Categorias(){
			$sql = "SELECT Categoria FROM Categoria;";
			return $this->conn->query($sql);
		}

		//obtiene todos los datos de un atleta
		public function DatosAtletaCompleto($ID_Atleta){
			$sql="SELECT * FROM persona p, atleta a WHERE p.CI=a.CI and a.ID_Atleta='$ID_Atleta';";
			return $this->conn->query($sql);
		}

		//actualizar datos de un atleta
		public function ActualizarDatosAtleta($ID_Atleta, $Cedula, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $FechaNac, $Categoria, $Grado_instruccion, $Solvencia, $Colegio, $Estatus) {
    	$stmt = $this->conn->prepare("UPDATE persona p, atleta a SET p.Nombre1=?, p.Nombre2=?, p.Apellido1=?, p.Apellido2=?, p.Fecha_Nac=?, a.ID_Categoria=?, a.Grado_instruccion=?, a.Solvencia=?, a.Colegio=?, a.Estatus=? WHERE p.CI=? AND a.ID_Atleta=?");

    		// sssssissssss (12 's' and 1 'i') for the 12 parameters
    		$stmt->bind_param("sssssissssss", $Nombre1, $Nombre2, $Apellido1, $Apellido2, $FechaNac, $Categoria, $Grado_instruccion, $Solvencia, $Colegio, $Estatus, $Cedula, $ID_Atleta);

	    	return $stmt->execute();
		}
		


        //_______________________________________________________________________
        //_______________________ REPRESENTANTE _________________________________

		//devuelve el ultimo id de la tabla representante
		public function ultimo_id_representante(){
			$sql = "SELECT ID_Representante FROM representante ORDER BY ID_Representante DESC LIMIT 1;";
			return $this->conn->query($sql);
		}
		//verifica la existencia del representate para ese atleta
		public function VerificarExistenciaRepresentante($CI, $Atleta){
			$sql = "SELECT CI FROM representante where CI='$CI' and ID_Atleta='$Atleta';";
			return $this->conn->query($sql);
		}
		//registrar un representante
		public function RegistrarRepresentante($CODR, $ID_Representante, $ID_Atleta, $Cedula, $Parentesco, $Estatus){
			$foto=0;
			$stmt = $this->conn->prepare("INSERT INTO representante (CODR, ID_Representante, ID_Atleta, CI, Parentesco, Estatus, Foto ) VALUES (?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sssssss", $CODR, $ID_Representante, $ID_Atleta, $Cedula, $Parentesco, $Estatus, $foto);

			return $stmt->execute();
		}

        //_______________________________________________________________________
        //________________________ CREDENCIAL ___________________________________


        //_______________________________________________________________________
        //________________________ HORARIO ______________________________________


        //_______________________________________________________________________
        //_________________________ EVENTO ______________________________________

		//devuelve los eventos
		public function ListarEventos(){
			$sql = "SELECT * FROM evento;";
			return $this->conn->query($sql);
		}

		public function ListarAtletas(){
			$sql = "SELECT p.Nombre1, p.Apellido1, p.Fecha_Nac FROM persona p, atleta a WHERE a.CI=p.CI and a.Estatus='Activo';";
			return $this->conn->query($sql);
		}

		//devuelve las categorias
		public function ListarCategorias(){
			$sql = "SELECT * FROM categoria;";
			return $this->conn->query($sql);
		}

		//devuelve los tipos de evento
		public function ListarTiposEvento(){
			$sql = "SELECT * FROM tipo_evento;";
			return $this->conn->query($sql);
		}

		//devuelve los horarios
		public function ListarHorarios(){
			$sql = "SELECT * FROM horario;";
			return $this->conn->query($sql);
		}

		//registra un evento
		public function RegistrarEvento($ID_Categoria, $ID_Tipo, $Fecha, $ID_Horario, $Disciplina, $Descripcion){
			$stmt = $this->conn->prepare("INSERT INTO evento (ID_Categoria, ID_Tipo, Fecha, ID_Horario, Disciplina, Descripcion, Estatus) VALUES (?, ?, ?, ?, ?, ?, '1')");
			$stmt->bind_param("iisiss", $ID_Categoria, $ID_Tipo, $Fecha, $ID_Horario, $Disciplina, $Descripcion);
			return $stmt->execute();
		}
	}