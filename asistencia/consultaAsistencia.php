<?php
//Ver. 1.1 Mar-15
	$tpl = new TemplatePower('template/asistencia/consultaAsistencia.tpl');
	$tpl->prepare();

	
	foreach($_POST as $nombre_campo => $valor){
    $asignacion = '$' . $nombre_campo . '=\'' . $valor . '\';';
    if(!is_numeric($nombre_campo))
        eval($asignacion);
	}


	$tpl->assign('anterior', $anterior);
	$tpl->assign('siguiente', $siguiente);
	$tpl->printToScreen();	
?>