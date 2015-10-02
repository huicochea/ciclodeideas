<?php
require('template/class.TemplatePower.inc.php');
session_start();
include('miss/mensajes.php');
$mod = $_POST['mod'];
$acc = $_POST['acc'];
if(!isset($mod)){
    $mod = $_GET['mod'];
    $acc = $_GET['acc'];
}
if(isset($mod)){
    if($mod == 'log'){
        if(isset($acc)){
            if($acc == "in"){//Verifica que sea Inicio de Sesion.
                $nombreusr  = $_POST['nombreusr'];//nombre de usuario
                $pass  = $_POST['pass'];//contraseña
                
                include("config/connect.php");
          		$sql ="SELECT id,nombreusr,pass,nombre,apellidos,email,id_perfil,passreset FROM usuarios WHERE nombreusr ='".$nombreusr."' AND pass = '$pass' AND activo = 1";                
                $rs = mysql_query($sql,$conn);
	            $validado = false;
		        while($row = mysql_fetch_row($rs)){
                    if($row[1] == $nombreusr){
                            $validado     = true;
                            $_SESSION['nombreusr'] = $row[1];
                            $_SESSION['nombre'] = $row[1];
                            $_SESSION['perfil'] = $row[6];
                            $_SESSION['id_usuario'] = $row[0];
                    }
                }
                if($validado){
                    header("Location: control.php?mod=asistencia&acc=con");
                    die();
                }else{

                    echo"<script type='text/javascript'>
                            alert('Usuario incorrecto');
                            window.location='index.php';
                        </script>";
                        
                    
                }
                //************************************
                include("config/disconnect.php");
            }else if($acc == "out"){
                unset($_SESSION['nombreusr']);
                unset($_SESSION['nombre']);  
                unset($_SESSION['perfil']);                
                header("Location: index.php");
        die();
            }
        }
    }
}