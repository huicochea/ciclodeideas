<?php
$tpl = new TemplatePower('template/codigos/formaCodigo.tpl');
$tpl->prepare();

    $objestados = new Estado($conn);
    $objeventos = new Eventos($conn);
    $objcodigo = new Codigos($conn);
    $objasociado = new Asociados($conn);

    $id_codigo = '';
    if (!empty($_GET['id_codigo'])) {      
        $id_codigo = $_GET['id_codigo'];
    }


    if($id_codigo!=''){//Editar
        $tpl->assign("discodigo","disabled='disabled'");
        $tpl->assign("id_codigo",$id_codigo);

        $objcodigo->setID($id_codigo);
        $codigo = $objcodigo->codigoByid();
        /*
        echo "<pre>";
            print_r($codigo);
        echo "</pre>";
        */

        $tpl->assign("pulsera",$codigo['codigo_pulsera']);

        $lista_eventos = $objeventos->listaEventos();
        foreach ($lista_eventos as $evento) {
            
            $tpl->newBlock("eventos");
                $tpl->assign("nombre",$evento['nombre']);
                $tpl->assign("id",$evento['id']);
                if($evento['id']==$codigo['id_evento']){
                    $tpl->assign("seleve","selected='selected'");
                }
            $tpl->gotoBlock("_ROOT");  
        }

        if($codigo['tipo_entrada']==1){
            $tpl->assign("atotal","selected='selected'");
        }else{
            $tpl->assign("adias","selected='selected'");
        }
        $tpl->assign("dias_valido",$codigo['dias_valido']);


        if($codigo['id_asociado']!=''){//Tiene un asociado
            $tpl->assign("id_asociado",$codigo['id_asociado']);

            $objasociado->setId($codigo['id_asociado']);
            $asociado= $objasociado->asociadoByid();
            /*
            echo "<pre>";
                print_r($asociado);
            echo "</pre>";
            */

            $tpl->assign("nombre_asociado",$asociado['nombre']);
            $tpl->assign("apaterno",$asociado['apellido_p']);
            $tpl->assign("amaterno",$asociado['apellido_m']);
            $tpl->assign("escolaridad",$asociado['escolaridad']);
            $tpl->assign("sexo",$asociado['sexo']);
            $tpl->assign("edad",$asociado['edad']);
            $tpl->assign("email",$asociado['email']);
            $tpl->assign("tel",$asociado['tel']);
            $tpl->assign("cel",$asociado['cel']);
            $tpl->assign("municipio",$asociado['municipio']);

            if($asociado['sexo']=='m'){
                $tpl->assign("msexo","selected='selected'");
            }
            else{
                $tpl->assign("fsexo","selected='selected'");
            }

            $estados = $objestados->listaEstados();
            foreach ($estados as $estado) {
                
                $tpl->newBlock("estado");
                    $tpl->assign("id",$estado['id']);
                    $tpl->assign("nombre",$estado['nombre']);
                    if($asociado['id_estado']==$estado['id']){
                        $tpl->assign("selestado","selected='selected'");
                    }
                $tpl->gotoBlock("_ROOT");  
            }
        }
        else{
            $estados = $objestados->listaEstados();
            foreach ($estados as $estado) {
                
                $tpl->newBlock("estado");
                    $tpl->assign("id",$estado['id']);
                    $tpl->assign("nombre",$estado['nombre']);
                $tpl->gotoBlock("_ROOT");  
            }
        }


    }
    else{//Nuevo
        $estados = $objestados->listaEstados();
        foreach ($estados as $estado) {
            
            $tpl->newBlock("estado");
                $tpl->assign("id",$estado['id']);
                $tpl->assign("nombre",$estado['nombre']);
            $tpl->gotoBlock("_ROOT");  
        }


        $lista_eventos = $objeventos->listaEventos();
        foreach ($lista_eventos as $evento) {
            
            $tpl->newBlock("eventos");
                $tpl->assign("nombre",$evento['nombre']);
                $tpl->assign("id",$evento['id']);
            $tpl->gotoBlock("_ROOT");  
        }

    }



$tpl->printToScreen();        

?>