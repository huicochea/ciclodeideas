<?php

    $objcodigo = new Codigos($conn);
    $objasociado = new Asociados($conn);

    foreach($_POST as $nombre_campo => $valor){
        $asignacion = '$' . $nombre_campo . '=\'' . $valor . '\';';
        
        //echo $nombre_campo.": ".$valor."<br>";

        if(!is_numeric($nombre_campo)){
            eval($asignacion);
        }      
    }

    $objcodigo->setId($id_codigo);

    $codigo = date('ym');
    $codigo = $codigo.$pulsera;
    //echo $codigo;
    $objcodigo->setCodigo_pulsera($pulsera);
    $objcodigo->setDias_valido($dias_valido);
    $objcodigo->setCodigo($codigo);
    $objcodigo->setId_evento($evento);

    if($tipo_entrada=='1'){
        $objcodigo->setTipo_entrada('1');
    }
    else{
        $objcodigo->setTipo_entrada('2');
    }


    if($nombre_asociado!=''){//Camturaron los datos de la persona asociada a este codigo

        $objasociado->setId($id_asociado);
        $id_asociadoaux = $id_asociado;

        $objasociado->setNombre(utf8_encode($nombre_asociado));
        $objasociado->setApellido_p(utf8_encode($apaterno));
        $objasociado->setApellido_m(utf8_encode($amaterno));
        $objasociado->setEscolaridad($escolaridad);
        $objasociado->setSexo($sexo);
        $objasociado->setEdad($edad);
        $objasociado->setEmail($email);
        $objasociado->setTel($tel);
        $objasociado->setCel($cel);
        $objasociado->setMunicipio(utf8_encode($municipio));
        $objasociado->setId_estado($estado);
        $objasociado->setFolio_id(null);

        $id_asociado = $objasociado->save_asociado();

        if($id_asociadoaux!=''){
            $objcodigo->setId_asociado($id_asociadoaux);    
        }
        else{
            //Ya con el id del asociado agregarmos el codigo ya con la relacion de esta persona
            $objcodigo->setId_asociado($id_asociado);    
        }
        
        $objcodigo->saveCodigo();    

    }
    else{//No hay persona asociada a este codigo
        $objcodigo->saveCodigo();
    }



?>