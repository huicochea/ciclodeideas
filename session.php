<?php
include('miss/mensajes.php');
if (!isset($_SESSION['nombre'])){
        unset($_SESSION['id_usuario']);
        unset($_SESSION['nombreusr']);
        header("Location: index.php");
        die();
  exit;
}
else{
  $_username=$_SESSION['usuario'];
}
?>
