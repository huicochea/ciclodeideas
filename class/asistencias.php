<?php
    class Asistencias{
		private $id;
		private $id_evento;
		private $id_asociado;
		private $f_alta;
		private $id_codigo;
		private $q_alta;

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

                function getId_evento() {
                    return $this->id_evento;
                }

                function getId_asociado() {
                    return $this->id_asociado;
                }

                function getF_alta() {
                    return $this->f_alta;
                }

                function getId_codigo() {
                    return $this->id_codigo;
                }

                function getQ_alta() {
                    return $this->q_alta;
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

                function setId($id) {
                    $this->id = $id;
                }

                function setId_evento($id_evento) {
                    $this->id_evento = $id_evento;
                }

                function setId_asociado($id_asociado) {
                    $this->id_asociado = $id_asociado;
                }

                function setF_alta($f_alta) {
                    $this->f_alta = $f_alta;
                }

                function setId_codigo($id_codigo) {
                    $this->id_codigo = $id_codigo;
                }

                function setQ_alta($q_alta) {
                    $this->q_alta = $q_alta;
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

                    
		public function buscaAsistencia(){
			$lista = array();
			$sql = "SELECT a.id,a.id_evento,a.id_asociado,a.f_alta,a.id_codigo,a.q_alta,e.nombre,u.nombre,a.hora_alta
					FROM asistencias a LEFT JOIN evento e on a.id_evento = e.id
					LEFT JOIN usuarios u on a.q_alta = u.id WHERE id_codigo=$this->id_codigo";
            $rs = mysql_query($sql,$this->conexion);
			while ($row=mysql_fetch_row($rs)){
				$item=array("id"=>$row[0],
					"id_evento"=>$row[1],
					"id_asociado"=>$row[2],
					"f_alta"=>$row[3],
					"id_codigo"=>$row[4],
					"q_alta"=>$row[5],
					"evento"=>$row[6],
					"usr_alta"=>$row[7],
                    "hora_alta"=>$row[8]
					);
			}
			return $item;
		}       

		public function saveAsistencia(){
			$sql="INSERT INTO asistencias (id_evento,id_asociado,f_alta,id_codigo,q_alta,hora_alta) 
			 		VALUES ($this->id_evento,$this->id_asociado,curdate(),$this->id_codigo,$_SESSION[id_usuario],now())";
			$rs = mysql_query($sql,$this->conexion);
			if($rs){
                $exito = array("exito"=>1);
				return $exito;//Registro exitoso
			}
			else{
                $exito = array("exito"=>2);
				return $exito;//Errore en el registro
			}

		}

        public function valida_acceso_total(){
            $sql="SELECT a.id,a.id_evento,a.id_asociado,a.f_alta,a.id_codigo,a.q_alta,u.nombre,a.hora_alta,aso.nombre
                    FROM asistencias a  left join asociado aso on a.id_asociado = aso.id ,usuarios u
                    WHERE a.id_codigo = $this->id_codigo AND a.f_alta = curdate()
                    AND u.id = a.q_alta;";
            $rs = mysql_query($sql,$this->conexion);
            while ($row=mysql_fetch_row($rs)){
                $item=array("id"=>$row[0],
                    "id_evento"=>$row[1],
                    "id_asociado"=>$row[2],
                    "f_alta"=>$row[3],
                    "id_codigo"=>$row[4],
                    "q_alta"=>$row[5],
                    "usr_alta"=>$row[6],
                    "hora_alta"=>$row[7],
                    "Asociado"=>$row[8],                    
                    );
            }
            return $item;
        }
		
    
    		
	}
?>