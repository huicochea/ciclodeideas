<?php
	$tpl = new TemplatePower('template/codigos/consultaCodigos.tpl');
	$tpl->prepare();
	
	$objcodigo = new Codigos($conn);
	$objevento = new Eventos($conn);

	foreach($_POST as $nombre_campo => $valor){
    $asignacion = '$' . $nombre_campo . '=\'' . $valor . '\';';
    if(!is_numeric($nombre_campo))
        eval($asignacion);
	}

	$str='';


	if (!empty($_POST['codigo'])) {      
		$str .= " AND codigo like '%$codigo%'";
	}

	if (!empty($_POST['asociado'])) {      
		$str.=" AND(
			a.nombre like'%$asociado%'
			OR
			a.apellido_p like '%$asociado%'
			OR
			a.apellido_m like '%$asociado%'
			)";
	}

	if (!empty($_POST['dias_valido'])) {      
		//$str.=" AND dias_valido = '$dias_valido' OR ('$dias_valido' between  (select f_inicio FROM evento e2 where e2.id = e.id)  AND (select f_inicio FROM evento e3 where e3.id = e.id)  )";
		//$str.=" AND dias_valido = '$dias_valido' AND ('$dias_valido' between  (select f_inicio FROM evento e2 where e2.id = e.id)  AND (select f_inicio FROM evento e3 where e3.id = e.id)  )";
	}
	$objcodigo->setStr($str);


	$totalrowtrajo = 0;
	if (!empty($_GET['row_ini'])) {      
		$row_ini =$_GET['row_ini'];
		$totalrowtrajo = $row_ini;
	}else{
		$row_ini = 0;
	}

	if (!empty($_GET['row_fin'])) {      
		$row_fin =$_GET['row_fin'];
	}
	else{
		$row_fin =20;
	}


	$paginad = " limit $row_ini,$row_fin";
	$objcodigo->setPaginado($paginad);

	$estilo="";
	if($_SESSION['perfil'] != 1){
		$estilo = "style='display: none;'";
	}
	

	
	$lista_codigos = $objcodigo->listaCodigos();

	foreach ($lista_codigos as $codigo) {
		$totalrowtrajo++;
		$tpl->newBlock("codigos");		
			$tpl->assign("visible",$estilo);
			$tpl->assign("numero",$totalrowtrajo);
            $tpl->assign("codigo",$codigo['codigo']);
            $tpl->assign("evento",$codigo['evento']);
            $tpl->assign("tipo",$codigo['entrada']);
            $tpl->assign("id_codigo",$codigo['id']);
            if($codigo['dias_valido']!=''){
            	$tpl->assign("dias_valido",$codigo['dias_valido']);
            }
            else{
            	$objevento->setId($codigo['id_evento']);
            	$diasValidos = $objevento->eventoByid();
            	$tpl->assign("dias_valido",$diasValidos['f_inicio']." al ".$diasValidos['f_fin']);
            }
            $tpl->assign("asociado",$codigo['asociado']." ".$codigo['apellido_p']." ".$codigo['apellido_m']);
            
        $tpl->gotoBlock("_ROOT");  
	}

	$row_ini_sig=$totalrowtrajo;
	$row_fin_sig=20;

	$row_ini_ant=$row_ini-20;
	$row_fin_ant=20;

	$siguiente = "<a href='control.php?mod=codigos&acc=con&row_ini=$row_ini_sig&row_fin=$row_fin_sig' class='btn btn-primary'>Siguiente</a>";
	$anterior = "<a href='control.php?mod=codigos&acc=con&row_ini=$row_ini_ant&row_fin=$row_fin_ant' class='btn btn-primary'>Anterior</a>";
	
	if($totalrowtrajo>=20){			
		$tpl->assign('siguiente', $siguiente);
	}
	if($row_ini_sig>20){
		$tpl->assign('anterior', $anterior);
	}
	
	
	$tpl->printToScreen();	
?>