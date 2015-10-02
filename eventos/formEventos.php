<?php
//Ver. 1.1 Ago-13
$tpl = new TemplatePower('template/eventos/formaEventos.tpl');
$tpl->prepare();    

    $eventos = new Eventos($conn);

    if (!empty($_GET['id_evento'])) {      
        $id_evento = $_GET['id_evento'];    
    }
    else{
        $id_evento = '';
    }

    if($id_evento!=''){//Editar 
        $tpl->assign("titulo","Edita evento");
        $eventos->setID($id_evento);        
        $datos_evento = $eventos->eventoByid();

        $tpl->assign("nombrevento",$datos_evento['nombre']);
        $tpl->assign("descripcion",$datos_evento['descripcion']);
        $tpl->assign("f_ini",$datos_evento['f_inicio']);
        $tpl->assign("f_fin",$datos_evento['f_fin']);
        $tpl->assign("id",$id_evento);

    }
    else{//Nuevo
        $tpl->assign("titulo","Alta evento");
    }

$tpl->printToScreen();
?>