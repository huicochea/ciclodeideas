<?php
    class Asociados{
		private $id;
		private $nombre;
		private $apellido_p;
		private $apellido_m;
		private $escolaridad;
		private $sexo;
		private $edad;
		private $email;
		private $tel;
		private $cel;
		private $municipio;
		private $id_estado;
		private $folio_id;

		private $vlrValido;
		private $mensaje;
		var $conexion;
	
		function __construct($value) {
			$this->conexion=$value;
			$this->vlrValido = TRUE;
			$this->exito =FALSE;
		}
	
                function getId() {
                    return $this->id;
                }

   
                function setId($id) {
                    $this->id = $id;
                }

    
                function getNombre() {
                    return $this->nombre;
                }

   
                function setNombre($nombre) {
                    $this->nombre = $nombre;
                }

                function getApellido_p() {
                    return $this->apellido_p;
                }

                function getApellido_m() {
                    return $this->apellido_m;
                }

                function getEscolaridad() {
                    return $this->escolaridad;
                }

                function getSexo() {
                    return $this->sexo;
                }

                function getEdad() {
                    return $this->edad;
                }

                function getEmail() {
                    return $this->email;
                }

                function getTel() {
                    return $this->tel;
                }

                function getCel() {
                    return $this->cel;
                }

                function getMunicipio() {
                    return $this->municipio;
                }

                function getId_estado() {
                    return $this->id_estado;
                }

                function getFolio_id() {
                    return $this->folio_id;
                }

                function getVlrValido() {
                    return $this->vlrValido;
                }

                function getMensaje() {
                    return $this->mensaje;
                }

                function getConexion() {
                    return $this->conexion;
                }

                function setApellido_p($apellido_p) {
                    $this->apellido_p = $apellido_p;
                }

                function setApellido_m($apellido_m) {
                    $this->apellido_m = $apellido_m;
                }

                function setEscolaridad($escolaridad) {
                    $this->escolaridad = $escolaridad;
                }

                function setSexo($sexo) {
                    $this->sexo = $sexo;
                }

                function setEdad($edad) {
                    $this->edad = $edad;
                }

                function setEmail($email) {
                    $this->email = $email;
                }

                function setTel($tel) {
                    $this->tel = $tel;
                }

                function setCel($cel) {
                    $this->cel = $cel;
                }

                function setMunicipio($municipio) {
                    $this->municipio = $municipio;
                }

                function setId_estado($id_estado) {
                    $this->id_estado = $id_estado;
                }

                function setFolio_id($folio_id) {
                    $this->folio_id = $folio_id;
                }

                function setVlrValido($vlrValido) {
                    $this->vlrValido = $vlrValido;
                }

                function setMensaje($mensaje) {
                    $this->mensaje = $mensaje;
                }

                function setConexion($conexion) {
                    $this->conexion = $conexion;
                }

                                

		public function listaEstados(){
			$lista = array();
			$sql = "SELECT id,nombre FROM estados";
            $rs = mysql_query($sql,$this->conexion);
			while ($row=mysql_fetch_row($rs)){
				$item=array("id"=>$row[0],
					"nombre"=>utf8_decode($row[1])
					);
				array_push($lista, $item);
			}
            //var_dump($lista);
			return $lista;
		}


		public function save_asociado(){


			if($this->id!=''){//Actualiza asociado
				$sql="UPDATE asociado SET nombre = '$this->nombre',apellido_p = '$this->apellido_p',apellido_m = '$this->apellido_m',escolaridad = '$this->escolaridad',
				sexo = '$this->sexo',edad= $this->edad, email = '$this->email', tel = '$this->tel',cel = '$this->cel', municipio = '$this->municipio',id_estado = '$this->id_estado' WHERE id = $this->id";
			}
			else{
				$sql="INSERT INTO asociado (nombre,apellido_p,apellido_m,escolaridad,sexo,edad,email,tel,cel,municipio,id_estado,folio_id,f_alta)
					VALUES ('$this->nombre','$this->apellido_p','$this->apellido_m',
					'$this->escolaridad','$this->sexo',$this->edad,'$this->email','$this->tel','$this->cel','$this->municipio','$this->id_estado',null,curdate())";
			}

			$rs = mysql_query($sql,$this->conexion);
			if($rs){//Regresamos el id de la ultima persona agregada
				$sql2 = "SELECT max(id) FROM asociado";
				$rs2 = mysql_query($sql2,$this->conexion);
				while ($row=mysql_fetch_row($rs2)){
					$id_asociado = $row[0];
				}
				return $id_asociado;
			}
			else{//Error no se pudo agregar el asociado
				return false;

			}
		}    

		public function asociadoByid(){
			$sql="SELECT id,nombre,apellido_p,apellido_m,escolaridad,sexo,edad,email,tel,cel,municipio,id_estado,folio_id,f_alta,q_alta,f_modi,f_baja 
			FROM asociado WHERE id= $this->id";
			$rs = mysql_query($sql,$this->conexion);
			if($rs){//Regresamos el id de la ultima persona agregada								
				while ($row=mysql_fetch_row($rs)){
					$item=array("id"=>$row[0],
							"nombre"=>utf8_decode($row[1]),
							"apellido_p"=>utf8_decode($row[2]),
							"apellido_m"=>utf8_decode($row[3]),
							"escolaridad"=>$row[4],
							"sexo"=>$row[5],
							"edad"=>$row[6],
							"email"=>$row[7],
							"tel"=>$row[8],
							"cel"=>$row[9],
							"municipio"=>utf8_decode($row[10]),
							"id_estado"=>$row[11],
							"folio_id"=>$row[12],
							"f_alta"=>$row[13],
							"q_alta"=>$row[14],
							"f_modi"=>$row[15],
							"f_baja"=>$row[16]
						);
				}
				return $item;
			}
			return 2;

		}   
    
    		
	}
?>