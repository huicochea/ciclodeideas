<xml version='1.0' encoding='UTF-8' />
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" href="css/estilos.css" type="text/css" />
    <script type="text/JavaScript" src="js/jquery-2.1.4.js"></script>
    <script type="text/JavaScript" src="js/jquery-ui.js"></script>

    <title>CICLO DE IDEAS</title>
</head>

    <body   background="images/logo2.jpg" style="background-repeat: no-repeat; background-position: left center; background-size: 30% auto;">
        <div id="border-top" class="h_blue">
            <span class="title"><a href="index.php">Acceso al sistema</a></span>
        </div>

        <div id="content-box">
            <div id="element-box" class="login">
                <div class="m wbg">
                    <h1>CICLO DE IDEAS</h1>
                    <div id="system-message-container"> </div>
                    <div id="section-box">
                        <div class="m">
                            <form name="formulario" id="form-login" method="post" action="login.php">
                                <fieldset class="loginform">
                                    <table>
                                        <tr>
                                            <td>
                                                <label id="mod-login-username-lbl" for="mod-login-username">NOMBRE USUARIO</label>
                                            </td>
                                            <td></td>
                                            <td>
                                                <Input type='text' name='nombreusr' id="nombreusr" value="" class="inputbox" size="15" > 
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label id="mod-login-username-lbl" for="mod-login-username">CONTRASEÑA</label>
                                            </td>
                                            <td></td>
                                            <td>
                                                <Input type='password' name='pass' id="pass" value="" class="inputbox" size="15" > 
                                            </td>
                                        </tr>                                        
                                    </table>
                                    <div class="button-holder">                                    
                                        <div class="button1">
                                            <div class="next">
                                                <!--<a onclick="document.getElementById('form-login').submit();" class="button" href="#">Acceso</a>-->
                                                <input type="submit" name="acceso" value="Acceso"  class="btn btn-primary">
                                            </div>
                                        </div>                                    
                                    </div>
                                    <div class="clr"></div>
                                    <input type="hidden" id="mod" name="mod" value="log" />
                                    <input type="hidden" id="acc" name="acc" value="in" />
                                </fieldset>
                            </form>
                            <div class="clr"></div>
                        </div>
                    </div>
                    <div id="lock"></div>
                </div>
            </div>
            <noscript>
                ¡Advertencia! JavaScript debe estar habilitado para realizar esta operación en el panel de administración.</noscript>
        </div>

        <div id="footer"></div>
    </body>

</html>