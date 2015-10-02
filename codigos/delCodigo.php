<?php
    foreach($_GET as $nombre_campo => $valor){
    $asignacion = '$' . $nombre_campo . '=\'' . $valor . '\';';
    
    //echo $nombre_campo.": ".$valor."<br>";
    if(!is_numeric($nombre_campo))
        eval($asignacion);
    }    
    
    $objcodigo = new Codigos($conn);
    
    $objcodigo->setId($id_codigo);

    $exito = $objcodigo->delCodigo();
    
?>