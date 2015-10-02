<!DOCTYPE html>
	<!--
	To change this license header, choose License Headers in Project Properties.
	To change this template file, choose Tools | Templates
	and open the template in the editor.
	-->
	<html>
	    <head>
	        <meta charset="UTF-8">
	        <title></title>
	    </head>
	    <body>
	        <?php
	        require('template/class.TemplatePower.inc.php');
			$tpl = new TemplatePower('template/index.tpl');
			$tpl->prepare();
			$tpl->printToScreen();
	        ?>
	    </body>
	</html>
