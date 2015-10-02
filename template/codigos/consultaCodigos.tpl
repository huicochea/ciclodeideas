<div align='center'>
    <div align='right'>
        <table>
            <tr>
                <td>
                    <div class="botonMain"><a href="control.php?mod=codigos&acc=new" class="btn btn-primary">Nuevo</a>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <table class="adminlist">
        <tr>
            <th colspan="7">
                <p><font face="Verdana" size="2" color="#314D7F"> Consulta codigos </font></p>
            </th>
        </tr>

        <form action="control.php" method="post">
          <tr>
                <td></td>
                <td>CÓDIGO: <input name="codigo" class="form-control" onkeypress="return isNumberKey(event)" maxlength="10" ></td>
                <td>NOMBRE ASOCIADO: <input name="asociado" class="form-control" placeholder="BUSCA POR NOMBRE O UN APELLIDO"></td>
                <!--<td>FECHA DE ACCESO: <input name="dias_valido" class="datepicker"></td>-->
                <td></td>
                <td></td>
                <td></td>            
          </tr>
          <tr>
              
                <td></td>
                <td><input type="submit" name="buscar" value="BUSCAR"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>            
          </tr>
        <input type="hidden" name="mod" value="codigos">
        <input type="hidden" name="acc" value="con">
        </form>



        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>        

    </table>
    <br>
<!-- <form> FILTRO: <input id='searchTerm' type='text' onkeyup='doSearch()' /> </form>-->

    <table class="adminlist" id="datos">
        <tr>
            <th width="1px">N°
            </th>
            <th><p>Codigo</p>
            </th>
            <th style="width: 70px"><p>Barra</p>
            </th>
            <th><p>Evento</p>
            </th>
            <th><p>Tipo Entrada</p></th>
            <th><p>Días Valido</p></th>
            <th><p>Asociado</p></th>
            <th><p>Imprimir</p></th>
            <th><p>Editar</p></th>
            <th><p>Eliminar</p></th>
        </tr>

      <!-- START BLOCK : codigos -->
      <tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
         <td>{numero}</td>
         <td style="width: 120px">{codigo}</td>
         <td><img src='class/clsCodigoBarras.php?width=370&height=40&barcode={codigo}' width="140px" height="20px"></td>
         <td>{evento}</td>
         <td>{tipo}</td>
         <td>{dias_valido}</td>
         <td>{asociado}</td>
         <td><a href="codigos/genera.php?id_codigo={id_codigo}" target="_blank"><img src="images/Print.png" width="25px"> </a>  </td>
         <td><a href="control.php?mod=codigos&acc=new&id_codigo={id_codigo}"><img src="images/Modify.gif" width="15px"> </a>  </td>
         <td>
             <img src="images/no.gif" width="15px" onclick="eliminar_codigo(this)" name="{codigo}" id="{id_codigo}" {visible}> 
        </td>
      </tr>
      <!-- END BLOCK : codigos -->   

         <tr  style="text-align: center">
            <td colspan="9">{anterior} &nbsp; {siguiente}</td>
            <td></td>
        </tr>
     

    </table>
</div>