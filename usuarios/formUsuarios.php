<?php
//Ver. 1.1 Ago-13
$tpl = new TemplatePower('template/usuarios/formaUsuarios.tpl');
$tpl->prepare();
$objusuario = new Usuario($conn);

    if($_GET['idusu']!=''){//Actualiza
        $tpl->assign('titulo', "Editar usuario");
        $objusuario->setId($_GET['idusu']);
        $usuario = $objusuario->byId();

        $tpl->assign('read', "readonly");
        
        $tpl->assign('nombreusr', $usuario['nombreusr']);
        $tpl->assign('nombreusu', $usuario['nombre']);
        $tpl->assign('apellidos', $usuario['apellidos']);
        $tpl->assign('email', $usuario['email']); 
        $tpl->assign('pass', $usuario['pass']);                
        $tpl->assign('id', $usuario['id']);
        if($usuario['id_perfil']==2){
            $tpl->assign('sel1', "selected = 'selected'");
        }
        if($usuario['id_perfil']==3){
            $tpl->assign('sel2', "selected = 'selected'");
        }

    }
    else{//Nuevo
        $tpl->assign('titulo', "Nuevo usuario");
    }

$tpl->printToScreen();    

?>