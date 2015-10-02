<form action="control.php" method="post" name="forma" id='forma' onsubmit="return validar_codigo()" enctype="multipart/form-data">
  <table width="100%" class="adminlist">
    <tr>
      <td width="43">&nbsp;</td>
      <td colspan='6'><b><font face="Verdana" size="2" color="#314D7F">{titulo}</font></b></td>
    </tr>
    

      <tr>
         <td></td>
         <td style="width: 120px" >Codigo de pulsera</td>
         <td>
            <input type="text" name="pulsera" id="pulsera" value="{pulsera}"  {discodigo} class="form-control" onkeypress="return isNumberKey(event)" maxlength="6" placeholder="Introduce el código de la pulsera">
         </td>
      </tr>
      
      <tr>
         <td></td>
         <td>Evento</td>
         <td>
            <select name="evento" class="form-control" >
              <!-- START BLOCK : eventos -->
                    <option value="{id}" {seleve}>{nombre}</option>
              <!-- END BLOCK : eventos -->   
            </select>            
         </td>
      </tr>      


      <tr>
         <td></td>
         <td style="width: 120px">Tipo entrada</td>
         <td>
            <select class="form-control" name="tipo_entrada" id="tipo_entrada">
                <option value="1" {atotal} >Acceso total</option>
                <option valule="2" {adias}>Acceso un día</option>              
            </select>            
         </td>
      </tr>      

      <tr id="undia">
         <td></td>
         <td>Selecciona el día</td>
         <td>
            <input type="text" name="dias_valido" id="dias_valido" class="datepicker form-control" value="{dias_valido}">
         </td>
      </tr>      

      <tr>
         <td></td>
         <td style="width: 120px">&nbsp;</td>
         <td></td>
      </tr>

      <tr>
         <td></td>
         <td style="width: 120px">&nbsp;</td>
         <td></td>
      </tr>      

      <tr>
         <td></td>
         <td>Nombre *</td>
         <td>
            <input type="text" name="nombre_asociado" id="nombre_asociado" class="form-control" value="{nombre_asociado}" placeholder="Nombre">
         </td>
      </tr>      

      <tr>
         <td></td>
         <td>Apellido paterno *</td>
         <td>
            <input type="text" name="apaterno" id="apaterno" class="form-control" value="{apaterno}" placeholder="Apellido paterno">
         </td>
      </tr>      

      <tr>
         <td></td>
         <td>Apellido materno *</td>
         <td>
            <input type="text" name="amaterno" id="amaterno" class="form-control" value="{amaterno}" placeholder="Apellido materno">
         </td>
      </tr>      

      <tr>
         <td></td>
         <td>Escolaridad</td>
         <td>
            <input type="text" name="escolaridad" id="escolaridad" class="form-control" value="{escolaridad}" placeholder="Escolaridad">
         </td>
      </tr>      

      <tr>
         <td></td>
         <td>Sexo</td>
         <td>
            <select name="sexo" class="form-control">
              <option value="m" {msexo}>M</option>
              <option value="f" {fsexo}>F</option>              
            </select>
         </td>
      </tr>      

      <tr>
         <td></td>
         <td>Edad *</td>
         <td>
            <input type="text" name="edad" id="edad" class="form-control" onkeypress="return isNumberKey(event)" maxlength="2" value="{edad}" placeholder="Edad">
         </td>
      </tr>      

      <tr>
         <td></td>
         <td>Email</td>
         <td>
            <input type="text" name="email" id="email" class="form-control" value="{email}" placeholder="Email">
         </td>
      </tr>      

      <tr>
         <td></td>
         <td>Telefono</td>
         <td>
            <input type="text" name="tel" id="tel" class="form-control" value="{tel}" placeholder="Telefono" onkeypress="return isNumberKey(event)" >
         </td>
      </tr>      

      <tr>
         <td></td>
         <td>Celular</td>
         <td>
            <input type="text" name="cel" id="cel" class="form-control" value="{cel}" placeholder="Celular" onkeypress="return isNumberKey(event)" >
         </td>
      </tr>      

      <tr>
         <td></td>
         <td>Estado</td>
         <td>
            <select name="estado" class="form-control" >
              <option value="*">Seleccione...</option>
              <!-- START BLOCK : estado -->
                    <option value="{id}" {selestado}>{nombre}</option>
              <!-- END BLOCK : estado -->   
            </select>            
         </td>
      </tr>      

      <tr>
         <td></td>
         <td>Municipio</td>
         <td>
            <input type="text" name="municipio" id="municipio" class="form-control" value="{municipio}" placeholder="Municipio">
         </td>
      </tr>      

    <tr>
      <td width="43">&nbsp;</td>
      <td colspan="6">
        <input type="hidden" value="{id_codigo}" name="id_codigo" id="id_codigo"/>
        <input type="hidden" value="{id_asociado}" name="id_asociado" id="id_asociado"/>
        <input type="hidden" id="acc" name="acc" value="save" />
        <input type="hidden" id="mod" name="mod" value="codigos" />
        <input type='submit' value='Guardar'class="btn btn-primary" id="guardar" />
        <a href="control.php?mod=codigos&acc=con"> <input type='button' value='Regresar'class="btn btn-primary"/> </a>
      </td>
    </tr>
  </table>
</form>


<script>
  $(document).ready(function() {
      
      $("#undia").hide();
      var opc1 = document.getElementById("tipo_entrada").value;
      if (opc1 != '1') {
              $("#undia").show();
          } else {
              $("#undia").hide();
              $("#dias_valido").val('');
      }

      $("#tipo_entrada").change(function(event) {
          var opc = document.getElementById("tipo_entrada").value;
          if (opc != '1') {
              $("#undia").show();
          } else {
              $("#undia").hide();
              $("#dias_valido").val('');
          }
      });
  }); 
</script>