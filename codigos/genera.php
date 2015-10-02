<?php		
	require('code39.php');
	include("../config/connect.php");
	header('Content-Type: text/html; charset=UTF-8');
	//bool mysqli_set_charset ($conn , "UTF-8" );
	//mb_internal_encoding("UTF-8");
	//echo mb_internal_encoding();

	$id_codigo = $_GET['id_codigo'];
	$sql = "SELECT c.id_asociado,c.codigo,c.id_evento,c.codigo_pulsera,a.nombre,a.apellido_p,a.apellido_m,DATE_FORMAT(c.dias_valido,'%d %b %y')
			FROM  codigo c left join asociado a on c.id_asociado = a.id WHERE c.id = $id_codigo";
	$rs = mysql_query($sql,$conn);
	while ($row = mysql_fetch_row($rs)) {
		$codigo = array("id_asociado"=>$row[0],
				"codigo"=>$row[1],
				"id_evento"=>$row[2],
				"codigo_pulsera"=>$row[3],
				"nombre_asociado"=>utf8_decode($row[4])." ".utf8_decode($row[5])." ".utf8_decode($row[6]),
				"dias_valido"=>$row[7]
			);
	}

	$sql2 = "SELECT id,nombre,logotipo,descripcion,DATE_FORMAT(f_inicio,'%d %b %y'),DATE_FORMAT(f_fin,'%d %b %y') FROM evento WHERE  id = $codigo[id_evento]";
	$rs2 = mysql_query($sql2,$conn);
	while ($row = mysql_fetch_row($rs2)) {
		$evento = array("id"=>$row[0],
				"nombre"=>$row[1],
				"logotipo"=>$row[2],
				"descripcion"=>$row[3],
				"f_inicio"=>$row[4],
				"f_fin"=>$row[5]				
			);
	}


	include("../config/disconnect.php");


	$pdf=new PDF_Code39('P','mm','letter');
	//$pdf = new FPDF('P','mm','letter');
	
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
		
	//$pdf->Image("../".$evento['logotipo'] , 20 ,60, 60 , 35,'JPG', '');	//p1 = posicion x, p2 = posicion y, p3 = largo, p4 = alto
	$pdf->Image("../"."eventos/imgs/nueva.jpg" , 14 ,11, 79 , 85,'JPG', '');	//p1 = posicion x, p2 = posicion y, p3 = largo, p4 = alto
	$pdf->Code39(20,110,$codigo['codigo'],1,15);


	$pdf->cell(87,122,"",1,0,'T');
	
	

	$pdf->SetFont('Arial','',12);	
	$pdf -> SetY(86);    // set the cursor at Y position 5	
	$pdf -> SetX(20);
	
	$pdf->cell(55,25,$codigo['nombre_asociado'],0,0,'');
	//$pdf->cell(55,25,$evento['nombre'],0,0,'C');
		
	$pdf -> SetY(93);    // set the cursor at Y position 5
	$pdf -> SetX(25);
	//$pdf->SetFont('Arial','B',14);	
	//$pdf->cell(55,25,$evento['nombre'],0,0,'C');
	if($codigo['dias_valido']!=''){
		$pdf->cell(55,25,$codigo['dias_valido'],0,0,'C');	
	}
	else{//Buscar las fechas del evento de este codigo
		$pdf->cell(55,25,"Del ".$evento['f_inicio']." Al ".$evento['f_fin'],0,0,'C');
	}
	



	$pdf->Output();

?>