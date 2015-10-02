<?php
session_start();
require('template/class.TemplatePower.inc.php');
include('session.php');
$tpl = new TemplatePower('template/main.tpl');
$tpl->prepare();
$tpl->assign('usuario', $_username);
include('template/header.php');
$tpl->printToScreen();
include('template/footer.php');
?>