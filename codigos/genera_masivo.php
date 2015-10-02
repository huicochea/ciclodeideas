<?php	
	require('code39.php');
	include("../config/connect.php");
	
	$id_codigo = $_GET['id_codigo'];
	$sql = "SELECT id_asociado,codigo,id_evento,codigo_pulsera FROM  codigo WHERE id = $id_codigo";
	$rs = mysql_query($sql,$conn);
	while ($row = mysql_fetch_row($rs)) {
		$codigo = array("id_asociado"=>$row[0],
				"codigo"=>$row[1],
				"id_evento"=>$row[2],
				"codigo_pulsera"=>$row[3]				
			);
	}

	$sql2 = "SELECT id,nombre,logotipo,descripcion FROM evento WHERE  id = $codigo[id_evento]";
	$rs2 = mysql_query($sql2,$conn);
	while ($row = mysql_fetch_row($rs2)) {
		$evento = array("id"=>$row[0],
				"nombre"=>$row[1],
				"logotipo"=>$row[2],
				"descripcion"=>$row[3]				
			);
	}


	$listacodigos=array();
	$sql="SELECT id,id_asociado,codigo,id_evento,tipo_entrada,dias_valido,codigo_pulsera FROM CODIGO WHERE f_baja is null ";
	$rs = mysql_query($sql,$conn);
	while ($row = mysql_fetch_row($rs)) {
		$item = array("id"=>$row[0],
				"id_asociado"=>$row[1],
				"codigo"=>$row[2],
				"id_evento"=>$row[3],
				"tipo_entrada"=>$row[4],
				"dias_valido"=>$row[5],
				"codigo_pulsera"=>$row[6]
			);
		array_push($listacodigos, $item);
	}

	

	$pdf=new PDF_Code39('P','mm','letter');
	//$pdf = new FPDF('P','mm','letter');
	
	$aux = 0;
	$pdf->AddPage();
	foreach ($listacodigos as $codigo) {
		$aux++;
		if($aux==4){
			$pdf->AddPage();
			$aux=0;
		}

		$id_codigo = $codigo['id'];
		$sql = "SELECT id_asociado,codigo,id_evento,codigo_pulsera FROM  codigo WHERE id = $id_codigo";
		$rs = mysql_query($sql,$conn);
		while ($row = mysql_fetch_row($rs)) {
			$codigo2 = array("id_asociado"=>$row[0],
					"codigo"=>$row[1],
					"id_evento"=>$row[2],
					"codigo_pulsera"=>$row[3]				
				);
		}


		$sql2 = "SELECT id,nombre,logotipo,descripcion FROM evento WHERE  id = $codigo2[id_evento]";
		$rs2 = mysql_query($sql2,$conn);
		while ($row = mysql_fetch_row($rs2)) {
			$evento = array("id"=>$row[0],
					"nombre"=>$row[1],
					"logotipo"=>$row[2],
					"descripcion"=>$row[3]				
				);
		}

		$pdf->SetFont('Arial','B',16);

		$p1=20;
		$p2=20;
		$p3=60;
		$p4=35;
		
		$pdf->Image("../".$evento['logotipo'] , $p1 ,$p2, $p3 , $p4,'JPG', '');	//p1 = posicion x, p2 = posicion y, p3 = largo, p4 = alto
		$pdf->Code39(20,58,$codigo['codigo'],1,15);

		$p1++;
		$p2++;
		$p3++;
		$p4++;

		$pdf->cell(83,70,"",1,0,'T');
		$pdf -> SetY(5);    // set the cursor at Y position 5
		$pdf->SetFont('Arial','B',14);	
		$pdf->cell(55,25,$evento['nombre'],0,0,'C');


	}//Fin foreach 



	
	



	$pdf->Output();
	include("../config/disconnect.php");

?>