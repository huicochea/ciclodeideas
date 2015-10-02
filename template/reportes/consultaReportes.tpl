<div align='center'>

    <table class="adminlist">
        <tr>
            <th colspan="7">
                <p><font face="Verdana" size="2" color="#314D7F"> Consulta Reportes </font></p>
            </th>
        </tr>

        <form action="reportes/generareporte.php" method="post" target="_blank">
          <tr>
                <td></td>
                <td>FECHA ASISTENCIA: <input name="codigo" class="form-control datepicker" pleaceholder="BUSCAR POR FECHA DE ASISTENCIA" ></td>
                <td>SEXO: 
                  <select class="form-control" name="sexo">
                      <option value="*">Seleccione...</option>
                      <option value="m">Masculino</option>
                      <option value="f">Femenino</option>
                  </select>
                </td>
                <td></td>
                <td></td>
                <td></td>            
          </tr>
          
          <tr>
                <td></td>
                <td>ESTADO: 
                    <select class="form-control">
                      <option>Seleccione..</option>
                      <option>Merelos</option>
                      <option>DF</option>
                    </select>
                </td>
                <td>EDAD: <input name="asociado" class="form-control" placeholder="BUSCA POR EDAD"></td>
                <!--<td>FECHA DE ACCESO: <input name="dias_valido" class="datepicker"></td>-->
                <td></td>
                <td></td>
                <td></td>            
          </tr>
          

          <tr>              
                <td></td>
                <td><input type="submit" name="buscar" class="btn btn-primary" value="GENERAR"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>            
          </tr>
        </form>
      </table>
</div>