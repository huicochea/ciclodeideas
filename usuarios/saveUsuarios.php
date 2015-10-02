<?php
    foreach($_POST as $nombre_campo => $valor){
    $asignacion = '$' . $nombre_campo . '=\'' . $valor . '\';';
    if(!is_numeric($nombre_campo))
        eval($asignacion);
    }

    $objusuario = new Usuario($conn);

    $objusuario->setId($idusu);
    $objusuario->setNombreusr($nombreusr);
    $objusuario->setNombre($nombreusu);
    $objusuario->setApellidos($apellidos);
    $objusuario->setEmail($email);
    $objusuario->setPass($pass);
    $objusuario->setId_perfil($perfil_i);

    $objusuario->save();


?>