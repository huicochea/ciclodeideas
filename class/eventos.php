<?php
    class Eventos{
		private $id;
		private $nombre;
        private $descripcion;
		private $fecha_inicio;
		private $fecha_fin;
		private $activo;
		private $f_alta;
		private $f_modi;
		private $f_baja;
		private $q_alta;
		private $q_modi;
		private $q_baja;
		private $logotipo;

		private $vlrValido;
		private $mensaje;
		var $conexion;
	
		function __construct($value) {
			$this->conexion=$value;
			$this->vlrValido = TRUE;
			$this->exito =FALSE;
		}
	
		function getID(){
			return $this->id;
		}
		
		public function setID($id){
			if($this->vlrValido){
				if (is_null($id)){
					$this->mensajes="Err3";
					$this->vlrValido = FALSE;
				}elseif (!is_numeric($id)){
					$this->mensajes="Err3";
					$this->vlrValido = FALSE;
				}else{
					$this->id=$id;
					$this->vlrValido = TRUE;
				}
			}
		}
                
                function getNombre() {
                    return $this->nombre;
                }
                function getDescripcion() {
                    return $this->descripcion;
                }

                function getFecha_inicio() {
                    return $this->fecha_inicio;
                }

                function getFecha_fin() {
                    return $this->fecha_fin;
                }

                function getActivo() {
                    return $this->activo;
                }

                function getF_alta() {
                    return $this->f_alta;
                }

                function getF_modi() {
                    return $this->f_modi;
                }

                function getF_baja() {
                    return $this->f_baja;
                }

                function getQ_alta() {
                    return $this->q_alta;
                }

                function getQ_modi() {
                    return $this->q_modi;
                }

                function getQ_baja() {
                    return $this->q_baja;
                }

                function getLogotipo() {
                    return $this->logotipo;
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

                function setNombre($nombre) {
                    $this->nombre = $nombre;
                }

                function setDescripcion($descripcion) {
                    $this->descripcion = $descripcion;
                }                

                function setFecha_inicio($fecha_inicio) {
                    $this->fecha_inicio = $fecha_inicio;
                }

                function setFecha_fin($fecha_fin) {
                    $this->fecha_fin = $fecha_fin;
                }

                function setActivo($activo) {
                    $this->activo = $activo;
                }

                function setF_alta($f_alta) {
                    $this->f_alta = $f_alta;
                }

                function setF_modi($f_modi) {
                    $this->f_modi = $f_modi;
                }

                function setF_baja($f_baja) {
                    $this->f_baja = $f_baja;
                }

                function setQ_alta($q_alta) {
                    $this->q_alta = $q_alta;
                }

                function setQ_modi($q_modi) {
                    $this->q_modi = $q_modi;
                }

                function setQ_baja($q_baja) {
                    $this->q_baja = $q_baja;
                }

                function setLogotipo($logotipo) {
                    $this->logotipo = $logotipo;
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

                	
		public function listaEventos(){
			$lista = array();
			$sql = "SELECT id,nombre,f_inicio,f_fin,activo,f_alta,f_modi,f_baja,q_alta,q_modi,q_baja,logotipo,descripcion FROM evento WHERE f_baja is null ORDER BY id DESC";
            $rs = mysql_query($sql,$this->conexion);
			while ($row=mysql_fetch_row($rs)){
				$item=array("id"=>$row[0],
					"nombre"=>utf8_decode($row[1]),
					"f_inicio"=>$row[2],
					"f_fin"=>$row[3],
					"activo"=>$row[4],
					"f_alta"=>$row[5],
					"f_modi"=>$row[6],
					"f_baja"=>$row[7],
					"q_alta"=>$row[8],
					"q_modi"=>$row[9],
					"q_baja"=>$row[10],
					"logotipo"=>$row[11],
                    "descripcion"=>utf8_decode($row[12])
					);
				array_push($lista, $item);
			}
			return $lista;
		}       
      

		public function eventoByid(){
            $sql="SELECT id,nombre,f_inicio,f_fin,activo,f_alta,f_modi,f_baja,q_alta,q_modi,q_baja,logotipo,descripcion FROM evento WHERE id = '".$this->id."'";
            $rs = mysql_query($sql,$this->conexion);
            while ($row=mysql_fetch_row($rs)){
                $item=array("id"=>$row[0],
                    "nombre"=>utf8_decode($row[1]),
                    "f_inicio"=>$row[2],
                    "f_fin"=>$row[3],
                    "activo"=>$row[4],
                    "f_alta"=>$row[5],
                    "f_modi"=>$row[6],
                    "f_baja"=>$row[7],
                    "q_alta"=>$row[8],
                    "q_modi"=>$row[9],
                    "q_baja"=>$row[10],
                    "logotipo"=>$row[11],
                    "descripcion"=>utf8_decode($row[12])
                    );
            }
            return $item;
		}


		public function saveEvento(){

            if($this->id!=''){
                if($this->logotipo!=''){
                    $sql="UPDATE evento SET nombre = '$this->nombre' , f_inicio = '$this->fecha_inicio', 
                    f_fin = '$this->fecha_fin', activo = 1 ,logotipo = '$this->logotipo',descripcion = '$this->descripcion'  WHERE id = $this->id";
                }
                else{
                    $sql="UPDATE evento SET nombre = '$this->nombre' , f_inicio = '$this->fecha_inicio', 
                    f_fin = '$this->fecha_fin', activo = 1 ,descripcion = '$this->descripcion' WHERE id = $this->id";
                }

            }
            else{
                if($this->logotipo!=''){
                    $sql="INSERT INTO evento (nombre, f_inicio, f_fin, activo, f_alta,q_alta,logotipo,descripcion) 
                    VALUES ('$this->nombre','$this->fecha_inicio','$this->fecha_fin', '1',CURDATE(), $_SESSION[id_usuario],'$this->logotipo','$this->descripcion')";                                    
                }
                else{
                    $sql="INSERT INTO evento (nombre, f_inicio, f_fin, activo, f_alta,q_alta,descripcion) 
                    VALUES ('$this->nombre','$this->fecha_inicio','$this->fecha_fin', '1',CURDATE(), $_SESSION[id_usuario],'$this->descripcion')";
                }

            }
            
            $rs = mysql_query($sql,$this->conexion);
            if($rs)
            {
               return 1;
            }
            else{
                return 2;
            }


		}

        public function delEvento(){
            $sql="UPDATE evento SET f_baja = CURDATE() WHERE id = $this->id";
            $rs = mysql_query($sql,$this->conexion);
            if($rs)
            {
               return 1;
            }
            else{
                return 2;
            }

        }
	


	}
?>