<?php
//Ver. 1.1 Mar-15
	$tpl = new TemplatePower('template/usuarios/consultaUsuarios.tpl');
	$tpl->prepare();
	
	foreach($_POST as $nombre_campo => $valor){
    $asignacion = '$' . $nombre_campo . '=\'' . $valor . '\';';
    if(!is_numeric($nombre_campo))
        eval($asignacion);
	}

	$objUsuario = new Usuario($conn);

	$lista = $objUsuario->listaUsuarios();

	foreach ($lista as $usuario) {
		$tpl->newBlock("usuarios");
			$tpl->assign("nombreusr",$usuario['nombreusr']);
			$tpl->assign("nombre",$usuario['nombre']." ".$usuario['apellidos']);
			$tpl->assign("perfil",$usuario['perfil']);
			$tpl->assign("id",$usuario['id']);
		$tpl->gotoBlock("_ROOT");  
	}

	$tpl->printToScreen();	
?>