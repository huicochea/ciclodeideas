<?php
	include("../lib/PHPMailer/class.phpmailer.php");
	include("../lib/PHPMailer/class.smtp.php");
	
	class EnvioCorreo{
		private $cuerpo;
		private $asunto;
		private $destinatario;
		private $ccopia;
		private $mensaje;

		function __construct($destinatario,$ccopia) {
			$this->destinatario =$destinatario;
			$this->ccopia = $ccopia;
		}

		function setDestinatario($destinatario){
				$this->destinatario=$destinatario;
		}

		function setCcopia($copia){
			$this->ccopia=$copia;
		}

		function getDestinatario(){
			return $this->destinatario;
		}

		function getCcopia(){
			return $this->ccopia;
		}
		
		function getMensaje(){
			return $this->mensaje;
		}
		
		function enviar(){
			include("../config/connect.php");
			include("../class/correo.php");
			$correo =  new Correo($conn);
			$correo->setID("1");
			$correo->consultacorreoID();

			$mail = new PHPMailer();
			$mail->IsSMTP(); 	

			$mail->Host = $correo->getHostMail();    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $correo->getPortMail();				 		   //Puerto del servidor 
			$mail->Username = $correo->getusUarioMail();				 	  //usuario de cuenta
			$mail->Password = $correo->getPassMail(); 
			$mail->From = $correo->getCuentaMail();										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->FromName = $correo->getNameMail();									// nombre remitente, p. ej.: "Servicio de envío automático"
			$mail->SMTPAuth = true;										// si el SMTP necesita autenticación
	
			$mail->Subject = $correo->getAsuntoNoticia();									// asunto y cuerpo alternativo del mensaje
			$mail->MsgHTML($correo->getCuerpoNoticia());										// si el cuerpo del mensaje es HTML

			$mail->AddAddress($this->destinatario);			//direcion de correo
			$mail->AddCC($this->ccopia);
	
			if(!$mail->Send()) {
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				return true;
			}
			include("../config/disconnect.php");
		}


		

		function enviarPassword($pass){//Envio de password
			include("../config/connect.php");
			include("../class/correo.php");
			$correo =  new Correo($conn);
			$correo->setID("1");
			$correo->consultacorreoID();

			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = $correo->getHostMail();    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $correo->getPortMail();				 		   //Puerto del servidor 
			$mail->Username = $correo->getusUarioMail();				 	  //usuario de cuenta
			$mail->Password = $correo->getPassMail(); 
			$mail->From = $correo->getCuentaMail();										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->FromName = $correo->getNameMail();									// nombre remitente, p. ej.: "Servicio de envío automático"
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación
			$mail->Subject = $correo->getAsuntoNoticia();									// asunto y cuerpo alternativo del mensaje
			$mail->MsgHTML("Su contraseña es: ".$pass);										// si el cuerpo del mensaje es HTML
			$mail->AddAddress($this->destinatario);			//direcion de correo
	
			if(!$mail->Send()) {
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				return true;
			}

			include("../config/disconnect.php");
		}
		
		function autoriza($folio){//Autorizaron el envio
			include("../config/connect.php");
			include("../class/correo.php");
			$correo =  new Correo($conn);
			$correo->setID("1");
			$correo->consultacorreoID();

			$mail = new PHPMailer();
			$mail->IsSMTP(); 
			$mail->Host = $correo->getHostMail();    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $correo->getPortMail();				 		   //Puerto del servidor 
			$mail->Username = $correo->getusUarioMail();	 //usuario de cuenta
			$mail->Password = $correo->getPassMail(); 
			$mail->From = $correo->getCuentaMail();// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->FromName = $correo->getNameMail();									// nombre remitente, p. ej.: "Servicio de envío automático"
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación
			$mail->Subject = $correo->getAsuntoNoticia();									// asunto y cuerpo alternativo del mensaje
			$mail->MsgHTML("El envio con folio: ".$folio." fue autorizado: ");										// si el cuerpo del mensaje es HTML
			$mail->AddAddress($this->destinatario);			//Asignamos el correo del destinatario
			$mail->AddCC($this->ccopia);//Asignamos el correo de copia
			$mail->AddReplyTo($this->ccopia);

			if(!$mail->Send()) {
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				return true;
				echo("1");
			}

			include("../config/disconnect.php");
		}

		function cancela($comentarios,$folio){//Autorizaron el envio
			include("../config/connect.php");
			include("../class/correo.php");
			$correo =  new Correo($conn);
			$correo->setID("1");
			$correo->consultacorreoID();

			$mail = new PHPMailer();
			$mail->IsSMTP(); 
			$mail->Host = $correo->getHostMail();    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $correo->getPortMail();				 		   //Puerto del servidor 
			$mail->Username = $correo->getusUarioMail();				 	  //usuario de cuenta
			$mail->Password = $correo->getPassMail(); 
			$mail->From = $correo->getCuentaMail();										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->FromName = $correo->getNameMail();									// nombre remitente, p. ej.: "Servicio de envío automático"
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación
			$mail->Subject = $correo->getAsuntoNoticia();									// asunto y cuerpo alternativo del mensaje
			$mail->MsgHTML("El envío con folio: ".$folio." fue cancelado: <br>"."Comentarios de la cancelación: <br>".$comentarios);										// si el cuerpo del mensaje es HTML
			$mail->AddAddress($this->destinatario);			//direcion de correo
			$mail->AddCC($this->ccopia);//Asignamos el correo de copia
			$mail->AddReplyTo($this->ccopia);

			if(!$mail->Send()) {
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				echo "Enviado";
				return true;
			}

			include("../config/disconnect.php");
		}

		function costo($personaEnvio,$contenido,$costo){//El envio genero costo
			include("../config/connect.php");
			include("../class/correo.php");
			$correo =  new Correo($conn);
			$correo->setID("1");
			$correo->consultacorreoID();

			$mail = new PHPMailer();
			$mail->IsSMTP(); 
			$mail->Host = $correo->getHostMail();    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $correo->getPortMail();				 		   //Puerto del servidor 
			$mail->Username = $correo->getusUarioMail();				 	  //usuario de cuenta
			$mail->Password = $correo->getPassMail(); 
			$mail->From = $correo->getCuentaMail();										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->FromName = $correo->getNameMail();									// nombre remitente, p. ej.: "Servicio de envío automático"
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación
			$mail->Subject = $correo->getAsuntoNoticia();									// asunto y cuerpo alternativo del mensaje
			$mail->MsgHTML("El empleado: ".$personaEnvio."<br>Realizo un envio que genero costo.<br>"."Contenido del envío: ".$contenido."<br>Costo del envío: $".$costo);										// si el cuerpo del mensaje es HTML
			$mail->AddAddress($this->destinatario);			//direcion de correo
	
			if(!$mail->Send()) {
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				return true;
				
			}

			include("../config/disconnect.php");
		}



		function enviarNotificacion($valija){
			include("config/connect.php");
		
			$correo =  new Correo($conn);
			$correo->setID("1");
			$correo->consultacorreoID();

			$mail = new PHPMailer();
			$mail->IsSMTP(); 	

			$mail->Host = $correo->getHostMail();    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $correo->getPortMail();				 		   //Puerto del servidor 
			$mail->Username = $correo->getusUarioMail();				 	  //usuario de cuenta
			$mail->Password = $correo->getPassMail(); 
			$mail->From = $correo->getCuentaMail();										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->FromName = $correo->getNameMail();									// nombre remitente, p. ej.: "Servicio de envío automático"
			$mail->SMTPAuth = true;										// si el SMTP necesita autenticación

			$tpl = new TemplatePower($correo->getCuerpoNoticia(),T_BYVAR);
			$tpl->prepare();
			$tipoEnvio=new TipoEnvio();
			$tipoEnvio->setConexion($conn);
			$estatus=new Estados();
			$estatus->setConexion($conn);

			$estatus->consultaEstadoByID($valija->getEstado());
			$tipoEnvio->consultaTipoEnvioByID($valija->getTipoEnv());
                          $tpl->assign('tipo', $tipoEnvio->getDescripcion());
                          $tpl->assign('estado', $estatus->getDescripcion());

			$mail->Subject = $correo->getAsuntoNoticia()." ".$valija->getFolio();									// asunto y cuerpo alternativo del mensaje
			$mail->MsgHTML($tpl->getOutputContent());
			//$mail->MsgHTML($correo->getCuerpoCambioHr());										// si el cuerpo del mensaje es HTML
			$mail->AddAddress("papeleria@toks.com.mx");
			//$mail->AddAddress($this->destinatario);			//direcion de correo
			//$mail->AddCC($this->ccopia);


			if(!$mail->Send()) {
				$this->mensaje = $mail->ErrorInfo;
				echo "SMTP ".$this->mensaje;
				return false;
			} else {
                               // echo "enviado ..". $valija->getFolio();
				return true;
			}
			include("config/disconnect.php");
		}


		//Envio de correo para pendientes por recibir el dia de manana
		function correoPendientes($datos,$correo){
			$correo->setID("1");
			$correo->consultacorreoID();
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = $correo->getHostMail();    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $correo->getPortMail();				 		   //Puerto del servidor 
			$mail->Username = $correo->getusUarioMail();				 	  //usuario de cuenta
			$mail->Password = $correo->getPassMail(); 
			$mail->From = $correo->getCuentaMail();										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->FromName = $correo->getNameMail();									// nombre remitente, p. ej.: "Servicio de envío automático"
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación
			$mail->Subject = $correo->getAsuntoNoticia();									// asunto y cuerpo alternativo del mensaje
			$mail->MsgHTML("Recepciones Para el día de ma&ntilde;ana: <br>".$datos);										// si el cuerpo del mensaje es HTML
			$mail->AddAddress($this->destinatario);			//direcion de correo
	
			if(!$mail->Send()) {
				$this->mensaje = $mail->ErrorInfo;
				return $this->mensaje;
			} else {
				return true;
			}
			unset($correo);
			include("config/disconnect.php");
		}



		function enviarCambioHr($fecha,$hrIni,$hrFin){//Cuando se realizo un cambio de horario en valija
			include("config/connect.php");
			include("class/correo.php");
			$correo =  new Correo($conn);
			$correo->setID("1");
			$correo->consultacorreoID();

			$mail = new PHPMailer();
			$mail->IsSMTP(); 	

			$mail->Host = $correo->getHostMail();    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $correo->getPortMail();				 		   //Puerto del servidor 
			$mail->Username = $correo->getusUarioMail();				 	  //usuario de cuenta
			$mail->Password = $correo->getPassMail(); 
			$mail->From = $correo->getCuentaMail();										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->FromName = $correo->getNameMail();									// nombre remitente, p. ej.: "Servicio de envío automático"
			$mail->SMTPAuth = true;										// si el SMTP necesita autenticación
	
			$tpl = new TemplatePower($correo->getCuerpoCambioHr(),T_BYVAR);
			$tpl->prepare();
                          $tpl->assign('fechaH', $fecha);
                          $tpl->assign('horaI', $hrIni);
                          $tpl->assign('horaF', $hrFin);
            
			$mail->Subject = $correo->getAsuntoCambioHr();									// asunto y cuerpo alternativo del mensaje
			$mail->MsgHTML($tpl->getOutputContent());
			//$mail->MsgHTML($correo->getCuerpoCambioHr());										// si el cuerpo del mensaje es HTML
			//$mail->AddAddress("papeleria@toks.com.mx");
			$mail->AddAddress($this->destinatario);			//direcion de correo
			$mail->AddCC($this->ccopia);

	
			if(!$mail->Send()) {
				$this->mensaje = $mail->ErrorInfo;
				echo "SMTP ".$this->mensaje;
				return false;
			} else {
				return true;
			}
			include("config/disconnect.php");
		}
	}
?>