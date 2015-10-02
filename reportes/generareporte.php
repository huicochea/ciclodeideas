<?php
include("../config/connect.php");
require_once '../Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();  
/*$objPHPExcel->getProperties()->setCreator("http://www.factobusiness.com.mx/wp/")
              ->setLastModifiedBy("http://www.factobusiness.com.mx/wp/")
              ->setTitle("REPORTE DE DATOS PERSONALES")
              ->setSubject("DATOS PERSONALES")
              ->setDescription("Reporte de datos personales")
              ->setKeywords("Reporte")
              ->setCategory("Reporte");    
*/
$sql = "SELECT  c.codigo_pulsera,a.f_alta,aso.nombre,aso.apellido_p,aso.apellido_m,aso.sexo,aso.edad,aso.email,aso.cel,aso.municipio,e.nombre,e.id
          FROM asistencias a
          left join codigo c on a.id_codigo = c.id
          left join asociado aso on a.id_asociado = aso.id
          left join estados e on e.id = aso.id";
$rs = mysql_query($sql,$conn);  

$lista=array();
while ($row = mysql_fetch_row($rs)) {
  $item=array("codigo_pulsera"=>$row[0],
    "f_alta"=>$row[1],
    "asociado"=>$row[2],
    "a_paterno"=>$row[3],
    "a_materno"=>$row[4],
    "sexo"=>$row[5],
    "edad"=>$row[6],
    "email"=>$row[7],
    "cel"=>$row[8],
    "municipio"=>$row[9],
    "estado"=>$row[10]
    );
  array_push($lista, $item);
}

//Combinamos las cendas
$objPHPExcel->getActiveSheet()->mergeCells('C1:E1');//Combinar cenldas
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1',"Asistencias");

$objPHPExcel->getActiveSheet()->mergeCells('F1:H1');//Combinar cenldas
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1',"Nombre Completo"); 

$objPHPExcel->getActiveSheet()->mergeCells('I1:J1');//Combinar cenldas
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1',"Sexo"); 


//Coloreamos la fuente y ponemos underline
$link_style_array = array(
  'font'  => array(
    'color' => array('rgb' => 'ffffff')
  )
);
$objPHPExcel->getActiveSheet()->getStyle("A1:O2")->applyFromArray($link_style_array);

/*
//Coloreamos la fuente 
$link_style_array = array(
  'font'  => array(
    'color' => array('rgb' => '95375b')
  )
);
$objPHPExcel->getActiveSheet()->getStyle("A3:G3")->applyFromArray($link_style_array);
*/

//Coloreamos las celdas
cellColor('C1:J1', '548135');
cellColor('B2:O2', 'a9d18d');

/*
//Centramos el texto horizontalmente
$style = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    )
);
$objPHPExcel->getActiveSheet()->getStyle("A1:G2")->applyFromArray($style);
$objPHPExcel->getActiveSheet()->getStyle("A3:G3")->applyFromArray($style);
unset($style);


//Centramos el texto verticalmente
$style = array(
    'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
    )
);
$objPHPExcel->getActiveSheet()->getStyle("A1:G2")->applyFromArray($style);
$objPHPExcel->getActiveSheet()->getStyle("A3:G3")->applyFromArray($style);
unset($style);
*/


//Titulos de Cabeceras
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2',"Codigo"); 
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C2',"08/10/2015"); 
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D2',"09/10/2015"); 
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E2',"10/10/2015"); 
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F2',"Nombre (s)"); 
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G2',"A. Paterno"); 
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H2',"A. Materno"); 
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I2',"Hombre"); 
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J2',"Mujer"); 
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K2',"Edad"); 
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L2',"Correo electronico"); 
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M2',"Celular"); 
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N2',"Municipio"); 
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O2',"Estado"); 

//Contenido              
$i = 3;  
foreach ($lista as $registro) {  
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$i, $registro['codigo_pulsera']);
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i, $registro['f_alta']);
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $registro['f_alta']);
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$i, $registro['f_alta']);
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$i, $registro['asociado']);
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$i, $registro['a_paterno']);
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$i, $registro['a_materno']);
  
  if($registro['sexo']=='m'){
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, "M");
  }
  elseif($registro['sexo']=='f'){
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$i, "F");
  }
  

  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$i, $registro['edad']);
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$i, $registro['email']);
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$i, $registro['cel']);
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('N'.$i, $registro['municipio']);
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('O'.$i, $registro['estado']);
  $i++;
}

//Ajustar las celdas al contenido del texto
foreach(range('B','O') as $columnID)
{
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
}

/*
//Color de borde 
$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);
$objPHPExcel->getActiveSheet()->getStyle('A4:G4')->applyFromArray($styleArray);
unset($styleArray);

//Marcar en Negritas los titulos 
$styleArray = array(
    'font' => array(
        'bold' => true
    )
);
$objPHPExcel->getActiveSheet()->getStyle('A4:G4')->applyFromArray($styleArray);
unset($styleArray);
*/

//Cabeceras para descargar el archivo
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Reporte_Academicos.xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;


function cellColor($cells,$color){
    global $objPHPExcel;

    $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));
}

?>