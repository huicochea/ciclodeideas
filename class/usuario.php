<?php
//Versión 1.1 Ago-13
    class Usuario{
		private $id;
		private $nombreusr;
		private $pass;
		private $nombre;
		private $apellidos;
		private $email;
		private $id_perfil;
		
		private $exito;
		private $vlrValido;
		var $conexion;
	
		function __construct($value) {
			$this->conexion=$value;
			$this->vlrValido = TRUE;
			$this->exito =FALSE;
		}

                function getId() {
                    return $this->id;
                }

                function getNombreusr() {
                    return $this->nombreusr;
                }

                function getPass() {
                    return $this->pass;
                }

                function getNombre() {
                    return $this->nombre;
                }

                function getApellidos() {
                    return $this->apellidos;
                }

                function getEmail() {
                    return $this->email;
                }

                function getId_perfil() {
                    return $this->id_perfil;
                }

                function getExito() {
                    return $this->exito;
                }

                function getVlrValido() {
                    return $this->vlrValido;
                }

                function getConexion() {
                    return $this->conexion;
                }

                function setId($id) {
                    $this->id = $id;
                }

                function setNombreusr($nombreusr) {
                    $this->nombreusr = $nombreusr;
                }

                function setPass($pass) {
                    $this->pass = $pass;
                }

                function setNombre($nombre) {
                    $this->nombre = $nombre;
                }

                function setApellidos($apellidos) {
                    $this->apellidos = $apellidos;
                }

                function setEmail($email) {
                    $this->email = $email;
                }

                function setId_perfil($id_perfil) {
                    $this->id_perfil = $id_perfil;
                }

                function setExito($exito) {
                    $this->exito = $exito;
                }

                function setVlrValido($vlrValido) {
                    $this->vlrValido = $vlrValido;
                }

                function setConexion($conexion) {
                    $this->conexion = $conexion;
                }

                                

		public function listaUsuarios(){
			$lista = array();
			$sql = "SELECT u.id,u.nombreusr,u.pass,u.nombre,u.apellidos,u.email,u.id_perfil,p.nombre FROM usuarios u ,perfiles p WHERE u.id_perfil = p.id AND u.activo=1 and u.id!=1";
            $rs = mysql_query($sql,$this->conexion);
			while ($row=mysql_fetch_row($rs)){
				$item = array("id" =>$row[0],"nombreusr" =>$row[1]
					,"pass"=>$row[2],
					"nombre"=>$row[3]
					,"apellidos"=>$row[4]
					,"email"=>$row[5]
					,"id_perfil"=>$row[6]
					,"perfil"=>$row[7]
					);
				array_push($lista, $item);
			}
			return $lista;
		}       

		public function byId(){
			$sql="SELECT id,nombreusr,pass,nombre,apellidos,email,id_perfil FROM usuarios WHERE id = $this->id and activo=1";
			$rs=mysql_query($sql,$this->conexion);
			while ($row = mysql_fetch_row($rs)) {
				$item=array("id"=>$row[0],
					"nombreusr"=>$row[1],
					"pass"=>$row[2],
					"nombre"=>$row[3],
					"apellidos"=>$row[4],
					"email"=>$row[5],
					"id_perfil"=>$row[6]
					);
			}
			return $item;

		}



		public function delUsuario(){
			$sql="UPDATE usuarios set activo = 0 WHERE id = $this->id";
			$rs=mysql_query($sql,$this->conexion);	
		}		
		


		public function save(){
			if($this->id!=''){//Update
				$sql ="UPDATE usuarios SET pass='$this->pass',nombre='$this->nombre',apellidos='$this->apellidos', 
					email = '$this->email', id_perfil = $this->id_perfil WHERE id = $this->id";

			}
			else{//Insert
				$sql="INSERT INTO usuarios (nombreusr,pass,nombre,apellidos,email,id_perfil)
				VALUES ('$this->nombreusr','$this->pass','$this->nombre','$this->apellidos','$this->email',$this->id_perfil);";
			}

			$rs=mysql_query($sql,$this->conexion);
			if($rs){
				echo "Exito";
			}
			else{
				echo "Error";
			}
		}
  
	}
?>