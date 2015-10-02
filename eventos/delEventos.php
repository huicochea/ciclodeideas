<?php
    foreach($_GET as $nombre_campo => $valor){
    $asignacion = '$' . $nombre_campo . '=\'' . $valor . '\';';
    
    //echo $nombre_campo.": ".$valor."<br>";
    if(!is_numeric($nombre_campo))
        eval($asignacion);
    }    
    $eventos = new Eventos($conn);
    $eventos->setId($id_evento);

    $exito = $eventos->delEvento();
    
?>