<?php
//Ver. 1.1 Ago-13
$tpl = new TemplatePower('template/registro/formaRegistro.tpl');
$tpl->prepare();
$producto = new Productos($conn);
$pedidos = new Pedido($conn);



if($acc == 'add'){
      $productos = $producto->ConsultaProductos();  
    foreach ($productos as $value) {
        $tpl->newBlock('productos');
            if($value['activo']==1){
                $tpl->assign('nom_producto',$value['nombre']);
                $tpl->assign('id_producto',$value['id']);
                $tpl->assign('simbolo',$value['simbolo'].':'.$value['descripcion'].':'.$value['item']);
            }
            else{
                $tpl->assign('nom_producto',$value['nombre']);
                $tpl->assign('id_producto',$value['id']);
                $tpl->assign('dis','disabled');
            }
            

        $tpl->gotoBlock('_ROOT');
    }



    $tpl->assign('titulo', "Registro de Información");
    $tpl->assign('activo', "checked");
    


    $tpl->printToScreen();
}
if($acc == 'edit'){
        $producto2 = new Productos($conn);
        $tpl->assign('titulo', "Editar Información");
        $id = $_GET['id'];
        $tpl->assign('id', $id);   
        $pedidos->setId($id);
        $producto=$pedidos->consultaPedidoById(); 

        $productos = $producto2->ConsultaProductos();  
        foreach ($productos as $value) {
            $tpl->newBlock('productos');
                if($value['activo']==1){
                    $tpl->assign('nom_producto',$value['nombre']);
                    $tpl->assign('id_producto',$value['id']);
                    $tpl->assign('simbolo',$value['simbolo'].':'.$value['descripcion'].':'.$value['item']);
                    $tpl->assign('desc',$value['descripcion']);
                    $tpl->assign('ite',$value['item']);
                }
                else{
                    $tpl->assign('nom_producto',$value['nombre']);
                    $tpl->assign('id_producto',$value['id']);
                    $tpl->assign('dis','disabled');
                }
                if($producto['id_producto']==$value['id']){
                    $tpl->assign('sel','selected');
                }            

            $tpl->gotoBlock('_ROOT');
        }


        
        $tpl->assign('cantidad',$producto['cantidad']);
        $tpl->assign('lote',$producto['lote']);
        $tpl->printToScreen();    
    }

?>