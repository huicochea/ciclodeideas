<?php
    session_start();
    include("../config/connect.php");
    include("../class/Codigos.php");
    include("../class/asistencias.php");

    $objcodigo = new Codigos($conn);    
    $objasistencia = new Asistencias($conn);    
    
    $codigo = $_GET['codigo'];
    //Buscamos que el codigo existe en la lista de codigo    

    if($codigo!=''){//El no esta en blanco
        $datos_codigo = $objcodigo->codigoBycodigo($codigo);                
        if($datos_codigo['id']!=''){//El codigo existe
            //Buscamos que el código no se haya registrado ya
            $objasistencia->setId_codigo($datos_codigo['id']);
            $asistencia =  $objasistencia->buscaAsistencia();   
            
            $objasistencia->setId_evento($datos_codigo['id_evento']);
            if($datos_codigo['id_asociado']!=''){
                $objasistencia->setId_asociado($datos_codigo['id_asociado']);    
            }
            else{
                $objasistencia->setId_asociado('null');    
            }
            if($asistencia['id']==''){//El codigo no se ha registrado
                //Validar el tipo de entrada del boleto,  y berificar si puede accerder este dia
                if($datos_codigo['tipo_entrada']==1){//Acceso total
                    //Puede entrar todos los días y este codigo no se ha registrado.
                    //Podemos hacer el registro
                    $exito = $objasistencia->saveAsistencia(); 
                    echo json_encode($exito);                      

                }elseif ($datos_codigo['tipo_entrada']==2) {//Acceso un día 
                    //Puede entrar solo un día,  vemos si el día de hoy es el dia que puede acceder
                    //Validamos si el codigo ya se leyo el día de hoy                
                    if($datos_codigo['dias_valido'] == date("Y-m-d")){
                        //No se ha leido, es de acceso de un día  y puede acceder solo el día de hoy
                        //Podemos hacer el registro por que el dia es el mismo y el codigo no se habia leido
                        $exito = $objasistencia->saveAsistencia(); 
                        echo json_encode($exito);       
                    }
                    else{
                        $datos_codigo['exito']=5;
                        //$exito = array("exito"=>5);//La fecha de acceso del codigo es para otro dia
                        echo json_encode($datos_codigo);  
                    }
                }
            }
            else{                                
                //El codigo ya se registro anteriormente,  
                //Pero falta validar el tipo de entrada y el dia en que va a acceder
                if($datos_codigo['tipo_entrada']==1){//Acceso total
                    //El codigo ya se leyo, pero es de acceso total y puede entrar los 3 días
                    //Validamos si el día de hoy ya ha sido leido
                    $valida = $objasistencia->valida_acceso_total();

                    if($valida['id']==''){//El codigo de acceso total no ha sido leido el día de hoy
                       echo "Entro";
                        //Podemos hacer el registro
                        $exito = $objasistencia->saveAsistencia(); 
                        echo json_encode($exito);  
                    }
                    else{//El codigo de acceso total ya fue leido el dia de hoy 
                        $valida['exito']=4;
                        //$exito = array("exito"=>4);//El codigo ya ha sido registrado el dia de hoy      
                        echo json_encode($valida);   
                    }

                }elseif ($datos_codigo['tipo_entrada']==2) {//Acceso un día 
                    //El código ya se leyo y es de solo un día, por lo tanto ya no puede acceder denuevo
                    $asistencia['exito']=3;
                    echo json_encode($asistencia);               
                }
            }    
        }
        else{//El codigo no existe
            $exito = array("exito"=>0);
            echo json_encode($exito);
        }
        //Considerar usar un iframe en la parte de vista para mostrar los que ya se han registrado
    }    
?>