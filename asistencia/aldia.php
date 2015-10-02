<?php session_start(); ?>
<html>
<head>
    <title>Accesos al día</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../css/estilos.css" type="text/css" />
    <meta http-equiv="refresh" content="5">
</head>
<body>
    
    <table class="table table-striped">
        <tr>
            <th>ASOCIADO</th>
            <th>CODIGO</th>
            <th>HORA DE ACCESO</th>
            <th>TIPO ENTRADA</th>
            <th>USR REGISTRO</th>
        </tr>
<?php 
include("../config/connect.php");
$sql="SELECT a.id,a.id_evento,a.id_asociado,a.f_alta,a.id_codigo,a.q_alta,a.hora_alta,aso.nombre,
        aso.apellido_p,aso.apellido_m,c.codigo,t.nombre,c.dias_valido,u.nombre
        FROM asistencias a left join asociado aso on a.id_asociado = aso.id, codigo c,tipo_entrada t, usuarios u
        WHERE a.id_codigo = c.id
        AND a.id_codigo = c.id
        AND c.tipo_entrada = t.id
        AND a.q_alta = u.id ORDER BY a.id DESC";
        $lista = array();
$rs = mysql_query($sql,$conn);
while ($row=mysql_fetch_row($rs)){
        $item=array("id_asistencia"=>$row[0],
                    "id_evento"=>$row[1],
                    "id_asociado"=>$row[2],
                    "f_alta"=>$row[3],
                    "id_codigo"=>$row[4],
                    "q_alta"=>$row[5],
                    "hora_alta"=>$row[6],
                    "asociado"=>$row[7]." ".$row[8]." ".$row[9],
                    "codigo"=>$row[10],
                    "entrada"=>$row[11],
                    "dias_valido"=>$row[12],
                    "usr_alta"=>$row[13]
        );
        array_push($lista, $item);
}

foreach ($lista as  $asistencia) {
    echo "<tr>";
    echo "<td>".$asistencia['asociado']."</td>";
    echo "<td>".$asistencia['codigo']."</td>";
    echo "<td>".$asistencia['hora_alta']."</td>";
    echo "<td>".$asistencia['entrada']."</td>";
    echo "<td>".$asistencia['usr_alta']."</td>";
    echo "</tr>";
}

?>
    </table>

</body>
</html>