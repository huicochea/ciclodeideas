<div align='center'>
    <div align='right'>
        <table>
            <tr>
                <td>
                    <div class="botonMain"><a href="control.php?mod=usuarios&acc=new" class="btn btn-primary">NUEVO</a>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <table class="adminlist">
        <tr>
            <th>
            </th>
            <th colspan="6">
                <p><font face="Verdana" size="2" color="#314D7F">ADMINISTRAR USUARIOS</font></p>
            </th>
        </tr>
    </table>

    <table class="adminlist" id="datos">

        <tr>
            <th width="1px">
            </th>
            <th>Nombre usr
            </th>
            <th>Nombre
            </th>
            <th>Perfil
            </th>
            <th>editar
            </th>
            <th>eliminar
            </th>
        </tr>

      <!-- START BLOCK : usuarios -->
        <tr   onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
            <td width="1px"></td>
            <td>{nombreusr}</td>
            <td>{nombre}</td>
            <td>{perfil}</td>
            <td><a href="control.php?mod=usuarios&acc=new&idusu={id}"><img src="images/Modify.gif" width="15px"> </a> </td>
            <td><img src="images/no.gif" width="15px" onclick="eliminar_usuario(this)" name="{nombre}" id="{id}"> </td>
        </tr>
      <!-- END BLOCK : usuarios -->  

    </table>
</div>