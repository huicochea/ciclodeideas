<div align='center'>
    <div align='right'>
        <table>
            <tr>
                <td>
                    <div class="botonMain"><a href="control.php?mod=eventos&acc=new" class="btn btn-primary">Nuevo</a>
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
                <p><font face="Verdana" size="2" color="#314D7F"> CONSULTA EVENTOS</font></p>
            </th>
        </tr>
    </table>

    <table class="adminlist" id="datos">

        <tr>
            <td width="1px">
            </td>
            <td><p>Nombre</p>
            </td>
            <td><p>Descripción</p>
            </td>            
            <td><p>Fecha inicio</p>
            </td>
            <td><p>Fecha fin</p>
            </td>
            <td><p>Logo del evento</p></td>
            <td><p>Editar</p></td>
            <td><p>Eliminar</p></td>
        </tr>

      <!-- START BLOCK : eventos -->
      <tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
         <td></td>
         <td style="width: 120px">{nombre}</td>
         <td>{descripcion}</td>
         <td>{f_inicio}</td>
         <td>{f_fin}</td>
         <td><img src="{logotipo}" height="40px"></td>
         <td><a href="control.php?mod=eventos&acc=new&id_evento={id}"><img src="images/Modify.gif" width="15px"> </a>  </td>
         <td><img src="images/no.gif" width="15px" onclick="eliminar_evento(this)" name="{nombre}" id="{id}"> </td>
      </tr>
      <!-- END BLOCK : eventos -->   




    </table>
</div>