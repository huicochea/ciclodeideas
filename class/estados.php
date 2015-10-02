<?php
    class Estado{
		private $id;
		private $nombre;

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
    
    		
	}
?>