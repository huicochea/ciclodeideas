<?php
    $objusuario = new Usuario($conn);

    $objusuario->setId($_GET['idusu']);
    $objusuario->delUsuario();


?>