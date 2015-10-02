<?php
	$tpl = new TemplatePower('template/eventos/consultaEventos.tpl');
	$tpl->prepare();

	foreach($_POST as $nombre_campo => $valor){
    $asignacion = '$' . $nombre_campo . '=\'' . $valor . '\';';
    if(!is_numeric($nombre_campo))
        eval($asignacion);
	}

	$eventos = new Eventos($conn);
	$lista_eventos = $eventos->listaEventos();

	foreach ($lista_eventos as $evento) {
		
		$tpl->newBlock("eventos");
            $tpl->assign("nombre",$evento['nombre']);
            $tpl->assign("f_inicio",$evento['f_inicio']);
            $tpl->assign("f_fin",$evento['f_fin']);
            $tpl->assign("logotipo",$evento['logotipo']);
            $tpl->assign("descripcion",$evento['descripcion']);
            $tpl->assign("id",$evento['id']);
        $tpl->gotoBlock("_ROOT");  
	}

	//$tpl->assign('anterior', $anterior);
	//$tpl->assign('siguiente', $siguiente);
	$tpl->printToScreen();	
?>

