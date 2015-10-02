
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es" dir="ltr">
<!--Esta pagina contiene el menu -->

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>CICLO DE IDEAS</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/estilos.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery-ui.css" type="text/css" />

    <!--<script type="text/JavaScript" src="js/jquery-2.1.4.js"></script>-->
    <script type="text/JavaScript" src="js/jquery-1.8.3.js"></script>
    
    <script type="text/JavaScript" src="js/jquery-ui.js"></script>
    <script type="text/JavaScript" src="js/funciones.js"></script>
</head>

<body id="minwidth-body">
    <div id="header-box">
        <img src="images/logo2.jpg" width="80px">
    </div>
    <!-- header-box -->
    <div id="content-box">
        
        <div>

            <div class="infocol" style="padding-right: 46px;">
                    <table width="100%" class="adminlist">
                        <tr>
                            <td><b><font face="Verdana" size="2" color="#314D7F">Datos Personales del Colaborador: </font></b>
                            </td>
                        </tr>
                        <tr>
                            <td><span class='usuario'><strong>Usuario:</strong> <?php echo  $_SESSION['nombreusr']; ?></span>
                                <br>
                                <span class='usuario'><strong>Nombre:</strong> <?php echo  $_SESSION['nombre']; ?> </span>
                            </td>
                        </tr>
                    </table>
                </div>



            <div class="toolbar-list" id="toolbar"  style="margin-left: 0px;">
                <ul>
                    <?php 
                    if($_SESSION['perfil'] == 1 || $_SESSION['perfil'] == 2  || $_SESSION['perfil'] == 3){
                    ?>
                    <li class="button" id="toolbar-cancel"><a href="control.php?mod=asistencia&acc=con"><span class="icon-32-contacts" id="asistencias-menu"></span>Asistencia</a>
                    </li>
                    <?php 
                    }
                    ?>
                    <?php 
                    if($_SESSION['perfil'] == 1){
                    ?>
                    <li class="button" id="toolbar-cancel"><a href="control.php?mod=eventos&acc=con"><span class="icon-32-contacts" id="eventos-menu"></span>Eventos</a>
                    </li>                    
                    <?php
                    } 
                    ?> 
                    
                    <?php 
                    if($_SESSION['perfil'] == 1 || $_SESSION['perfil'] == 3){
                    ?>
                    <li class="button" id="toolbar-cancel"><a href="control.php?mod=codigos&acc=con"><span class="icon-32-contacts" id="enviar-icon-32-contacts"></span>Codigos</a>
                    </li>
                    <?php
                    } 
                    ?>
                    <?php 
                    if($_SESSION['perfil'] == 1){
                    ?>
                    <li class="button" id="toolbar-cancel"><a href="control.php?mod=usuarios&acc=con"><span class="icon-32-contacts" id="enviar-icon-32-contacts"></span>Usuarios</a>
                    </li>
                    <?php
                    } 
                    ?>
                    <?php 
                    if($_SESSION['perfil'] == 1){
                    ?>
                    <li class="button" id="toolbar-cancel"><a href="control.php?mod=rep&acc=con"><span class="icon-32-stats" id="reportes-icon-32-contacts"></span>Reportes</a>
                    </li>
                    <?php
                    } 
                    ?>
                    <li class="button" id="toolbar-cancel"><a href="login.php?mod=log&acc=out"><span class="icon-32-cancel" id="icon-32-cancel"></span></a></li><!--Salir-->
                </ul>        
                <!-- toolbar-list -->
            </div>
            <!-- m -->

            <div id="element-box">
            
                <!-- m -->
                <div class="m">