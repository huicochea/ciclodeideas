<div align='center'>
    <table class="adminlist">
        <tr>
            <th>
            </th>
            <th colspan="6">
                <p><font face="Verdana" size="2" color="#314D7F">LEE O CAPTURA EL CÓDIGO DE BARRAS</font></p>
            </th>
        </tr>
    </table>

    <table class="adminlist" id="datos">

        <tr>
            <td width="1px">
            </td>
            <td><p>Codigo</p>
            </td>
            <td><p><input name="codigo" id="codigo" class="form-control" placeholder="Captura el codigo de barras" maxlength="10" onkeypress="return isNumberKey(event)"></p>
            </td>
            <td><p></p>
            </td>
            <td><p></p>
            </td>
        </tr>
    </table>


    <table class="adminlist">
        <tr>
            <th>
            </th>
            <th colspan="6">
                <p><font face="Verdana" size="2" color="#314D7F">REGISTROS DEL DÍA DE HOY</font></p>
            </th>
        </tr>

        <tr>
            <td colspan="7">
                <iframe src="asistencia/aldia.php" width="100%" height="500px" name="aldia" id="registros"></iframe>
            </td>
        </tr>
    </table>



</div>

<script>

$(document).ready(function(){
    $("#codigo").focus();    
});

$("#codigo").keyup(function(){
    var codigo = $("#codigo").val(); 
        if(codigo.length==10){
            $.ajax({
                type: "GET",
                url: "asistencia/asiste.php",
                dataType: "json",
                data: {
                    codigo : codigo
                },
                success: function( objdato ){
                    if(objdato.exito==0){//El código no existe
                        alert("¡El codigo: "+codigo+" no existe en la base de datos!");
                        $("#codigo").val('');
                    }
                    if(objdato.exito==1){
                        alert("¡Registro exitoso!");
                        $("#codigo").val('');
                        //Refrescamos el iframe
                    }
                    if(objdato.exito==2){
                        alert("¡Error al hacer el registro!");
                        $("#codigo").val('');
                        //Refrescamos el iframe
                    }
                    if(objdato.exito==3){//El código ya se leyo y es de solo un día, por lo tanto ya no puede acceder denuevo
                        alert("¡El código de acceso "+ codigo +" ya ha sido leido por el usuario "+objdato.usr_alta+" \na las "+objdato.hora_alta+"!");
                        $("#codigo").val('');
                        //Refrescamos el iframe
                    }
                    if(objdato.exito==4){
                        alert("¡El código de acceso "+ codigo +" es de acceso total, pero ya fue leido el día de hoy \n por el usuario "+objdato.usr_alta +" a las "+objdato.hora_alta +"!");
                        $("#codigo").val('');
                        //Refrescamos el iframe
                    } 
                    if(objdato.exito==5){
                        alert("¡El código de acceso "+ codigo +" es para acceder \n el día "+objdato.dias_valido+"!");
                        $("#codigo").val('');
                        //Refrescamos el iframe
                    }                                        
                $("#codigo").val('');
                }
            }).done(function() {                
                document.getElementById('registros').contentDocument.location.reload(true);
                $("#codigo").focus();
                $("#codigo").val('');
            });    
        }
});
</script>