<?php
require('template/class.TemplatePower.inc.php');
session_start();
include('session.php');

error_reporting(0);
//error_reporting(E_ALL);


$_SESSION['opcion'] = '1';

if (!empty($_POST['mod'])) {      
    $mod = $_POST['mod'];
    $acc = $_POST['acc'];
}


if(!isset($mod)){
    $mod = $_GET['mod'];
    $acc = $_GET['acc'];
}
include('miss/mensajes.php');
include('template/header.php');

if(isset($mod)){
    //Inicio
    if($mod == 'asistencia'){
        include("config/connect.php");
        if($acc == "con"){//Consulta
            include("asistencia/consultaAsistencia.php");
        }else if($acc == 'cal'){
            //include("empresa/formEmpresa.php");
        }else if($acc == 'admin'){
            //include("empresa/formEmpresa.php");
       }else if($acc == 'edit'){
            //include("empresa/saveEmpresa.php");
            //include("empresa/consultaEmpresa.php");
       }
       include("config/disconnect.php");
    }


    //Eventos
    if($mod == 'eventos'){
        include("config/connect.php");
        include("class/Eventos.php");
        if($acc == "con"){
            include("eventos/consultaEventos.php");
        }else if($acc == 'new'){
            include("eventos/formEventos.php");
        }else if($acc == 'save'){
            include("eventos/saveEventos.php");
            include("eventos/consultaEventos.php");
       }else if($acc == 'del'){
            include("eventos/delEventos.php");
            include("eventos/consultaEventos.php");
       }
       include("config/disconnect.php");
    }

    //Codigos
    if($mod == 'codigos'){
        include("config/connect.php");
        include("class/Eventos.php");
        include("class/Codigos.php");        
        include("class/estados.php");
        include("class/asociados.php");
        if($acc == "con"){//Consulta
            include("codigos/consultaCodigos.php");
        }else if($acc == 'new'){
            include("codigos/formCodigos.php");
        }else if($acc == 'save'){
            include("codigos/saveCodigos.php");
            include("codigos/consultaCodigos.php");
       }else if($acc == 'del'){
            include("codigos/delCodigo.php");
            include("codigos/consultaCodigos.php");
       }
       else if($acc == 'imp'){//Generar un pdf para imprimir el codigo            
            include("codigos/genera.php");
            //include("codigos/consultaCodigos.php");
       }       
       include("config/disconnect.php");
    }

    //Usuarios
    if($mod == 'usuarios'){
        include("config/connect.php");
        include("class/usuario.php");
        if($acc == "con"){//Consulta
            include("usuarios/consultausuarios.php");
        }else if($acc == 'new'){
            include("usuarios/formUsuarios.php");
        }else if($acc == 'save'){
            include("usuarios/saveUsuarios.php");
            include("usuarios/consultausuarios.php");
       }else if($acc == 'del'){
            include("usuarios/delUsuarios.php");
            include("usuarios/consultausuarios.php");
       }
       include("config/disconnect.php");
    }

    //Reportes
    if($mod == 'rep'){
        include("config/connect.php");
        include("class/usuario.php");
        include("class/Eventos.php");
        include("class/Codigos.php");        
        include("class/estados.php");
        include("class/asociados.php");
        if($acc == "con"){//Consulta
            include("reportes/consultaReportes.php");
        }else if($acc == 'cal'){
            //include("empresa/formEmpresa.php");
        }else if($acc == 'admin'){
            //include("empresa/formEmpresa.php");
       }else if($acc == 'edit'){
            //include("empresa/saveEmpresa.php");
            //include("empresa/consultaEmpresa.php");
       }
       include("config/disconnect.php");
    }

}
include('template/footer.php');
?>