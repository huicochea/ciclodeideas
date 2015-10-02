<?php
//Ver 1.1 Ago-13
$pedido = new Pedido($conn);
if($acc == 'save'){
    $id_unidad_med    = $_POST['unidad_med'];
    $id_producto      = $_POST['productos'];
    $cantidad         = $_POST['cantidad'];
    $lote             = $_POST['lote'];
    $fecha_captura    = $_POST['fecha1'];


    if($activo == ''){
        $activo = 0;
    }else{
        $activo = 1;
    }

    $folio=$_SESSION['usuario'].date("YmdHis", time());  

    $pedido->setIdProducto($id_producto);
    $pedido->setCantidad($cantidad);
    $pedido->setLote($lote);
    $pedido->setFolioPedido($folio);
    $pedido->setFAlta($fecha_captura);//Es fecha de recepcion 
  

    if($_POST['id']==null || $_POST['id']==''){
        $pedido->guardaPedido();    
    }else{
        $pedido->setId($_POST['id']);
        $pedido->UpdatePedido();
    }

    
}
/*if($empresa->getMensajes()!=""){
    echo $arr[$empresa->getMensajes()];
}*/
?>