<script language="javascript" type="text/javascript">
  function validaEnvio(){
      if(trim(forma.nombre.value) == ""){
          alert("{empresa1}");
          forma.nombre.focus();
          return false;
      }
      return true;
  }
  function regresar(){
      forma.acc.value = 'con';
      forma.mod.value = 'reg';
      forma.submit();
  }
  function convMayus(field){
      field.value = field.value.toUpperCase();
  }
</script>
<script language="javascript" type="text/javascript">
function removeOptions(optionMenu){
  optionMenu.options.length = 0;
}

</script>

<SCRIPT language=Javascript>
        <!--
      function isNumberKey(evt)
      {
       // (key <= 13 || (key >= 48 && key <= 57) || key == 46
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode <= 13 || (charCode >= 48 && charCode <= 57) || charCode == 46)
            return true;
 
         return false;
      }
      //-->
</SCRIPT>

<script type="text/javascript">
$(document).ready(function() {
   $(".rango").datepicker();

 
});
</script>





<form action="configuracion.php" method="post" name="forma" id='forma' onsubmit="return validar()" enctype="multipart/form-data">
  <table width="100%" class="adminlist">
    <tr>
      <td width="43">&nbsp;</td>
      <td colspan='6'><b><font face="Verdana" size="2" color="#314D7F">{titulo}</font></b></td>
    </tr>
    
    <tr bgcolor="gary">
      <td>ID: {id}</td>
      <td>
          <select name="productos" id="producto" onchange="getval(this);">
              <option value="*">Seleccione...</option>
              <!-- START BLOCK : productos -->
              <option value="{id_producto}" {dis} {sel} id="{simbolo}">{nom_producto}</option>
              <!-- END BLOCK : productos -->
          </select>         
      </td>

      <td>
        Cantidad:
      </td>
      <td>
        <input type="text" name="cantidad" id="cantidad" placeholder="Introduce la cantidad" value="{cantidad}" onkeypress="return isNumberKey(event)"  maxlength="7"/>
         <span id="unidad_medida"> </span> 
      </td>

      <td>
        Lote:
      </td>
      <td>
        <input type="text" name="lote" id="lote"  placeholder="Introduce el Lote" value="{lote}"  onKeyPress="convMayus(this);" onKeyDown="convMayus(this);" onKeyUp="convMayus(this);"/>
      </td>

    </tr>

    <tr>
      <td> </td>
      <td colspan="3">DESCRIPCIÓN: <span id="des"> {desc}</span></td>

      <td>ITEM: </td>
      <td><span id="it">{ite}</span> </td>
    </tr>

    <tr>
      <td> </td>
      <td colspan="3"> FECHA DE RECEPCIÓN : <input type="text" class="rango" readonly="readonly" size="12" name="fecha1" id="datepicker1"></td>

      <td></td>
      <td> </td>
    </tr>

    <tr>
      <td width="43">&nbsp;</td>
      <td colspan="6">
        <input type="hidden" value="{id}" name="id" id="id"/>
        <input type="hidden" id="acc" name="acc" value="save" />
        <input type="hidden" id="mod" name="mod" value="reg" />
        <input type='submit' value='Guardar' class='submit' id="guardar" />
        <input type='button' value='Regresar' class='submit' onclick='regresar();'/>
      </td>
    </tr>
  </table>
</form>


<script type="text/javascript">
    function getval(sel) {
       //alert(sel.options[sel.selectedIndex].id);
       //$("unidad_medida").val(sel.options[sel.selectedIndex].id);
       str = sel.options[sel.selectedIndex].id;
      var datos = str.split(":"); 
      $("#unidad_medida").text(datos[0]);
      $("#it").text(datos[1]);
      $("#des").text(datos[2]);
         
    }
</script>



<script>function validar() {
  
  if (document.getElementById("producto").value == '*') { 
        alert ('Selecciona un producto.'); 
        return false;
  }
  
  
  if (document.getElementById("cantidad").value.length  == 0) { 
        alert ('Escribe una cantidad.'); 
        return false;
  }

  if (document.getElementById("lote").value.length  == 0) { 
        alert ('Escribe una Lote.'); 
        return false;
  }
  
  

  return true; 
}
</script>


