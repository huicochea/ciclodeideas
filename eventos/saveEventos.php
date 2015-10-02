<?php
    foreach($_POST as $nombre_campo => $valor){
    $asignacion = '$' . $nombre_campo . '=\'' . $valor . '\';';
    
    //echo $nombre_campo.": ".$valor."<br>";
    if(!is_numeric($nombre_campo))
        eval($asignacion);
    }
    
    $eventos = new Eventos($conn);

    $eventos->setId($id);
    $eventos->setNombre(utf8_encode($name));
    $eventos->setFecha_inicio($f_ini);
    $eventos->setFecha_fin($f_fin);
    $eventos->setDescripcion(utf8_encode($descripcion));
    //$eventos->setlogotipo($logotipotipo);

    


    // comprobar que han seleccionado un archivo
    if($_FILES['logotipo']['name'] != ""){ // El campo foto contiene una imagen...
        
        // Primero, hay que validar que se trata de un JPG/GIF/PNG
        $allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "GIF", "PNG");

        $extension = end(explode(".", $_FILES["logotipo"]["name"]));
        if ((($_FILES["logotipo"]["type"] == "image/gif")
                || ($_FILES["logotipo"]["type"] == "image/jpeg")
                || ($_FILES["logotipo"]["type"] == "image/png")
                || ($_FILES["logotipo"]["type"] == "image/pjpeg"))
                && in_array($extension, $allowedExts))
        {
            // el archivo es un JPG/GIF/PNG, entonces...
            $extension = end(explode('.', $_FILES['logotipo']['name']));
            $foto = substr(md5(uniqid(rand())),0,10).".".$extension;
            $directorio = "eventos/imgs";//dirname("empresas/logotipotipos"); // directorio de tu elección
            
            // almacenar imagen en el servidor
            move_uploaded_file($_FILES['logotipo']['tmp_name'], $directorio.'/'.$foto);
            $minFoto = 'min_'.$foto;
            $resFoto = 'res_'.$foto;
            resizeImagen($directorio.'/', $foto, 500, 500,$minFoto,$extension);
            //resizeImagen($directorio.'/', $foto, 500, 500,$resFoto,$extension);
            //unlink($directorio.'/'.$foto);
            $eventos->setlogotipo($directorio."/".$minFoto);
            
        } else { // El archivo no es JPG/GIF/PNG
            $malformato = $_FILES["logotipo"]["type"];
                echo  "Formato de imagen incorrecto, no se realizaron cambios";
            exit;
          }
        
    } else { // El campo foto NO contiene una imagen
        //No soleeciono archivo
        //$mensaje = "No selecciono archivo";
        //header("Location: cargarImagen.php?error=noImagen");
        $exito =  $eventos->saveEvento();
        
        echo"<script type='text/javascript'>
                        window.location='control.php?mod=eventos&acc=con&exito=$exito';
            </script>";
        exit;
    }   
    
    $exito = $eventos->saveEvento();
    

    function resizeImagen($ruta, $nombre, $alto, $ancho,$nombreN,$extension){
        $rutaImagenOriginal = $ruta.$nombre;
        if($extension == 'GIF' || $extension == 'gif'){
        $img_original = imagecreatefromgif($rutaImagenOriginal);
        }
        if($extension == 'jpg' || $extension == 'JPG'){
        $img_original = imagecreatefromjpeg($rutaImagenOriginal);
        }
        if($extension == 'png' || $extension == 'PNG'){
        $img_original = imagecreatefrompng($rutaImagenOriginal);
        }
        $max_ancho = $ancho;
        $max_alto = $alto;
        list($ancho,$alto)=getimagesize($rutaImagenOriginal);
        $x_ratio = $max_ancho / $ancho;
        $y_ratio = $max_alto / $alto;
        if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
        $ancho_final = $ancho;
            $alto_final = $alto;
        } elseif (($x_ratio * $alto) < $max_alto){
            $alto_final = ceil($x_ratio * $alto);
            $ancho_final = $max_ancho;
        } else{
            $ancho_final = ceil($y_ratio * $ancho);
            $alto_final = $max_alto;
        }
        $tmp=imagecreatetruecolor($ancho_final,$alto_final);
        imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
        imagedestroy($img_original);
        $calidad=70;
        imagejpeg($tmp,$ruta.$nombreN,$calidad);
        
    }










    //id,nombre,f_inicio,f_fin,activo,f_alta,f_modi,f_baja,q_alta,q_modi,q_baja,logotipotipo 


    //$pedido->setIdProducto($id_producto);

?>