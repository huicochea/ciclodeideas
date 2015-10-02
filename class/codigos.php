<?php
    class Codigos{
		private $id;
		private $id_asociado;
        private $codigo;
        private $f_alta;
        private $f_baja;
        private $q_alta;
        private $activo;
        private $id_evento;
        private $tipo_entrada;
        private $dias_valido;
        private $codigo_pulsera;
        private $str;
        private $paginado;



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
                function getPaginado() {
                    return $this->paginado;
                }
                function getStr() {
                    return $this->str;
                }

                function getId_asociado() {
                    return $this->id_asociado;
                }

                function getCodigo() {
                    return $this->codigo;
                }

                function getF_alta() {
                    return $this->f_alta;
                }

                function getF_baja() {
                    return $this->f_baja;
                }

                function getQ_alta() {
                    return $this->q_alta;
                }

                function getActivo() {
                    return $this->activo;
                }

                function getId_evento() {
                    return $this->id_evento;
                }

                function getTipo_entrada() {
                    return $this->tipo_entrada;
                }

                function getDias_valido() {
                    return $this->dias_valido;
                }

                function getCodigo_pulsera() {
                    return $this->codigo_pulsera;
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


                function setStr($str) {
                    $this->str = $str;
                }

                function setPaginado($paginado) {
                    $this->paginado = $paginado;
                }                

                function setId_asociado($id_asociado) {
                    $this->id_asociado = $id_asociado;
                }

                function setCodigo($codigo) {
                    $this->codigo = $codigo;
                }

                function setF_alta($f_alta) {
                    $this->f_alta = $f_alta;
                }

                function setF_baja($f_baja) {
                    $this->f_baja = $f_baja;
                }

                function setQ_alta($q_alta) {
                    $this->q_alta = $q_alta;
                }

                function setActivo($activo) {
                    $this->activo = $activo;
                }

                function setId_evento($id_evento) {
                    $this->id_evento = $id_evento;
                }

                function setTipo_entrada($tipo_entrada) {
                    $this->tipo_entrada = $tipo_entrada;
                }

                function setDias_valido($dias_valido) {
                    $this->dias_valido = $dias_valido;
                }

                function setCodigo_pulsera($codigo_pulsera) {
                    $this->codigo_pulsera = $codigo_pulsera;
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

                                	
		public function listaCodigos(){
			$lista = array();
			$sql = "SELECT c.id,c.id_asociado,c.codigo,c.f_alta,c.f_baja,c.q_alta,c.activo,c.id_evento,c.tipo_entrada,c.dias_valido,c.codigo_pulsera, 
                    e.nombre,a.nombre,a.apellido_p,a.apellido_m,t.nombre
                    FROM codigo c left join evento e on c.id_evento = e.id
                    left join asociado a on c.id_asociado = a.id
                    left join tipo_entrada t on c.tipo_entrada = t.id WHERE c.f_baja is null $this->str ORDER BY id DESC $this->paginado";

            $rs = mysql_query($sql,$this->conexion);
			while ($row=mysql_fetch_row($rs)){
				$item=array("id"=>$row[0],
					"id_asociado"=>utf8_decode($row[1]),
					"codigo"=>$row[2],
					"f_alta"=>$row[3],
					"f_baja"=>$row[4],
					"q_alta"=>$row[5],
					"activo"=>$row[6],
					"id_evento"=>$row[7],
					"tipo_entrada"=>$row[8],
					"dias_valido"=>$row[9],
					"codigo_pulsera"=>$row[10],
                    "evento"=>utf8_decode($row[11]),
                    "asociado"=>utf8_decode($row[12]),
                    "apellido_p"=>utf8_decode($row[13]),
                    "apellido_m"=>utf8_decode($row[14]),
                    "entrada"=>$row[15]
					);
				array_push($lista, $item);
			}
			return $lista;
		}       
      

		public function codigoByid(){
            $sql="SELECT id,id_asociado,codigo,f_alta,f_baja,q_alta,activo,id_evento,tipo_entrada,dias_valido,codigo_pulsera FROM codigo WHERE id = '".$this->id."'";
            $rs = mysql_query($sql,$this->conexion);
            while ($row=mysql_fetch_row($rs)){
                $item=array("id"=>$row[0],
                    "id_asociado"=>$row[1],
                    "codigo"=>$row[2],
                    "f_alta"=>$row[3],
                    "f_baja"=>$row[4],
                    "q_alta"=>$row[5],
                    "activo"=>$row[6],
                    "id_evento"=>$row[7],
                    "tipo_entrada"=>$row[8],
                    "dias_valido"=>$row[9],
                    "codigo_pulsera"=>$row[10]
                    );
            }
            return $item;
		}

        public function codigoBycodigo($codigo){
            $sql="SELECT id,id_asociado,codigo,f_alta,f_baja,q_alta,activo,id_evento,tipo_entrada,dias_valido,codigo_pulsera FROM codigo WHERE codigo = '$codigo'";

            $rs = mysql_query($sql,$this->conexion);
            while ($row=mysql_fetch_row($rs)){
                $item=array("id"=>$row[0],
                    "id_asociado"=>$row[1],
                    "codigo"=>$row[2],
                    "f_alta"=>$row[3],
                    "f_baja"=>$row[4],
                    "q_alta"=>$row[5],
                    "activo"=>$row[6],
                    "id_evento"=>$row[7],
                    "tipo_entrada"=>$row[8],
                    "dias_valido"=>$row[9],
                    "codigo_pulsera"=>$row[10]
                    );
            }
            return $item;

        }


		public function saveCodigo(){

            if($this->id!=''){//Editar codigo

                if($this->id_asociado!=''){
                    $sql="UPDATE codigo SET id_evento = $this->id_evento, tipo_entrada = $this->tipo_entrada, dias_valido = '$this->dias_valido',id_asociado = $this->id_asociado  WHERE id = $this->id";
                }
                else{
                    $sql="UPDATE codigo SET id_evento = $this->id_evento, tipo_entrada = $this->tipo_entrada, dias_valido = '$this->dias_valido'  WHERE id = $this->id";    
                }
                

            }
            else{//Nuevo codigo

                if($this->id_asociado!=''){
                    $sql="INSERT INTO codigo (id_asociado,codigo,f_alta,f_baja,q_alta,activo,id_evento,tipo_entrada,dias_valido,codigo_pulsera)
                        VALUES($this->id_asociado,'$this->codigo',curdate(),null,$_SESSION[id_usuario],1,$this->id_evento,'$this->tipo_entrada','$this->dias_valido','$this->codigo_pulsera');";
                }
                else{
                    $sql="INSERT INTO codigo (id_asociado,codigo,f_alta,f_baja,q_alta,activo,id_evento,tipo_entrada,dias_valido,codigo_pulsera)
                        VALUES(null,'$this->codigo',curdate(),null,$_SESSION[id_usuario],1,$this->id_evento,'$this->tipo_entrada','$this->dias_valido','$this->codigo_pulsera');";
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

        public function delCodigo(){
            $sql="UPDATE codigo SET f_baja = CURDATE() WHERE id = $this->id";
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