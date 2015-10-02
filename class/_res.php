<?php
class Empresa {
	private $id;
    private $nombre;
	private $activo;
    private $exito;
	private $vlrValido;
	private $mensaje;
	var $conexion;
	
	function __construct($value) {
      $this->conexion=$value;
	  $this->vlrValido = TRUE;
	  $this->exito =FALSE;
    }

 	public function getIDEmpresa(){
        return $this->id;
    }   
       
	public function setIDEmpresa($id){
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
	
    public function setNombreEmpresa($nombre){
		$this->nombre=$nombre;
	}

	public function getNombreEmpresa(){
        return $this->nombre;
    }

    public function getActivo(){
        return $this->activo;
    }
	
	public function setActivo($activo){
        return $this->activo = $activo;
    }
	public function getExito(){
		return $this->exito; 
	}
	
	public function getMensaje(){
		return $this->mensaje;
	}
	
	public function consultaEmpresa(){
		$listaEmpresa = array();
		$sql = "SELECT ID_EMPRESA,NOMBRE,ACTIVO FROM EMPRESA ORDER BY NOMBRE;";
		$rs = mssql_query($sql,$this->conexion);
		while ($row=mssql_fetch_row($rs)){
			$item = array("id"=> $row[0], "nombre"  => $row[1],"activo" => $row[2]);
			array_push($listaEmpresa,$item);
		}
		return $listaEmpresa;
	}

	public function consultaEmpresaActivo(){
		$listaEmpresa = array();
		$sql = "SELECT ID_EMPRESA,NOMBRE,ACTIVO FROM EMPRESA WHERE ACTIVO=1 ORDER BY NOMBRE;";
		$rs = mssql_query($sql,$this->conexion);
		while ($row=mssql_fetch_row($rs)){
			$item = array("id"=> $row[0], "nombre"  => $row[1],"activo" => $row[2]);
			array_push($listaEmpresa,$item);
		}
		return $listaEmpresa;
	}

	public function consultaEmpresaID($id_empr){
		$sql = "SELECT ID_EMPRESA,NOMBRE,ACTIVO FROM EMPRESA WHERE ID_EMPRESA=$id_empr;";
		$query = mssql_query($sql,$this->conexion);
		if($query){
			$row=mssql_fetch_assoc($query);
			$this->id     = $row['ID_EMPRESA'];
			$this->nombre = $row['NOMBRE'];
			$this->activo = $row['ACTIVO'];
			$this->exito  = TRUE;
		}else{
			$this->exito = FALSE;
		}
	}	

	public function guardaEmpresa(){
        if((is_null($this->id)) || ($this->id == "")){
            $sql="INSERT INTO EMPRESA (NOMBRE,ACTIVO) VALUES ('$this->nombre',$this->activo)";
        }else{
            $sql="UPDATE EMPRESA SET NOMBRE='$this->nombre',ACTIVO=$this->activo WHERE ID_EMPRESA=$this->id";
        }
        $query = mssql_query($sql,$this->conexion);
        if($query){
        	$this->exito = TRUE;
        }else{
        	$this->exito = FALSE;
        }
	}		
	
	public function completeEmpresa(){
		$listaEmpresa = array();
		$sql = "SELECT e.ID_EMPRESA,e.NOMBRE FROM EMPRESA e WHERE e.NOMBRE LIKE '%".$this->nombre."%'";
		$objQuery = mssql_query($sql,$this->conexion);
		while ($row=mssql_fetch_row($objQuery)){
			//la etiqueta value es lo que mostrara en el autocompletar
			$listaEmpresa [] = array("value" =>$row[1],"ID" =>$row[0]);
		}
		return $listaEmpresa;
	}
}
?>
