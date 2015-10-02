<form action="control.php" method="post" name="forma" id='forma' onsubmit="return validar_evento()" enctype="multipart/form-data">
   <table width="100%" class="adminlist">
      <tr>         
         <td colspan='6'><b><font face="Verdana" size="2" color="#314D7F">{titulo}</font></b></td>
      </tr>
      <tr>
         <td></td>
         <td style="width: 120px">&nbsp;</td>
         <td></td>
      </tr>
      <tr>
         <td></td>
         <td style="width: 120px">Nombre</td>
         <td>
            <input type="text" name="name" id="name" value="{nombrevento}" class="form-control">
         </td>
      </tr>
      <tr>
         <td></td>
         <td style="width: 120px">Descripción</td>
         <td>
            <textarea name="descripcion" id="descripcion" class="form-control">{descripcion}</textarea>            
         </td>
      </tr>      
      <tr>
         <td></td>
         <td>Fecha inicio</td>
         <td>
            <input type="text" name="f_ini" id="f_ini" class="datepicker form-control" value="{f_ini}">
         </td>
      </tr>      
      <tr>
         <td></td>
         <td>Fecha fin</td>
         <td>
            <input type="text" name="f_fin" id="f_fin" class="datepicker form-control"  value="{f_fin}">
         </td>
      </tr>
      <tr>
         <td></td>
         <td>Logotipo</td>
         <td>
            <input type="file" name="logotipo" id="logotipo" class="form-controls">
         </td>
      </tr>

      <tr>
         <td></td>
         <td width="43">&nbsp;</td>
         <td>
            <input type="hidden" value="{id}" name="id" id="id"/>
            <input type="hidden" id="acc" name="acc" value="save" />
            <input type="hidden" id="mod" name="mod" value="eventos" />
            <input type='submit' value='Guardar' class="btn btn-primary" id="guardar" />
            <input type='button' value='Regresar'class="btn btn-primary" onclick='regresar();'/>
         </td>
      </tr>
   </table>
</form>
