<?php
	$tpl = new TemplatePower('template/reportes/consultaReportes.tpl');
	$tpl->prepare();
	
	foreach($_POST as $nombre_campo => $valor){
    $asignacion = '$' . $nombre_campo . '=\'' . $valor . '\';';
    if(!is_numeric($nombre_campo))
        eval($asignacion);
	}

	$objcodigo = new Codigos($conn);
	$objevento = new Eventos($conn);

	
	$tpl->printToScreen();	
?>