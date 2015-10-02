<table width="100%" class="adminlist">

  <form action="control.php" method="post" name="forma" id='forma' onsubmit="return validar_usuario()" >
    <tr>
      <td width="130">&nbsp;</td>
      <td colspan='6'><b><font face="Verdana" size="2" color="#314D7F">{titulo}</font></b></td>
    </tr>
    
    <tr bgcolor="gary">      

      <td>
        Nombre Usuario:
      </td>
      <td>
        <input type="text" {read} name="nombreusr" id="nombreusr" placeholder="Escribe un nombre con el cual se accedera al sistema" value="{nombreusr}" class="form-control"/>        
      </td>
    </tr>


    <tr>
      <td>
        Contraseña:
      </td>
      <td>
        <input type="password" name="pass" id="pass"  placeholder="Introduce una contraseña" value="{pass}"  class="form-control" />
      </td>
    </tr>    

    <tr>
      <td>
        Nombre:
      </td>
      <td>
        <input type="text" name="nombreusu" id="nombreusu"  placeholder="Introduce Nombre" value="{nombreusu}"  class="form-control"/>
      </td>
    </tr>


    <tr>
      <td>
        Apellidos:
      </td>
      <td>
        <input type="text" name="apellidos" id="apellidos"  placeholder="Introduce Apellidos" value="{apellidos}"  class="form-control"/>
      </td>
    </tr>


    <tr>
      <td>
        email:
      </td>
      <td>
        <input type="text" name="email" id="email"  placeholder="Introduce email" value="{email}"  class="form-control"/>
      </td>
    </tr>


    <tr>
      <td>
        Perfil:
      </td>
      <td>
        <select name="perfil_i"  class="form-control">
            <option value="2" {sel1}>Recepcionista</option>
            <option value="3" {sel2}>Auxiliar Administrativo</option>            
        </select>
      </td>
    </tr>



    <tr>
      <td width="43">&nbsp;</td>
      <td colspan="6">
        <input type="hidden" value="{id}" name="idusu" id="idusu"/>
        <input type="hidden" id="acc" name="acc" value="save" />
        <input type="hidden" id="mod" name="mod" value="usuarios" />
        <input type='submit' value='Guardar' class='btn btn-primary' id="guardar" />
        <a href="control.php?mod=usuarios&acc=con" class="btn btn-primary">REGRESAR</a>
      </td>
    </tr>
  </table>
</form>

