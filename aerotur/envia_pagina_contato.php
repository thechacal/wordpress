<?php

		include("libs/phpmailer/class.phpmailer.php");

		$mail = new PHPMailer();

		$mail->Host = "smtp.quadradigital.com.br";
		$mail->SMTPAuth = true;
		$mail->Username = 'formularios@quadradigital.com.br';
		$mail->Password = 'quadra2014*';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		$mail->CharSet = "uft-8";
		$mail->From = "noreply@aerotur.com.br";
		$mail->Sender = "formularios@quadradigital.com.br";
		$mail->FromName = "Aerotur";
		$mail->AddAddress('dev@quadradigital.com.br', 'Aerotur Teste Form Contato');
		$mail->IsHTML(true);
		$mail->Subject  = "Aerotur Teste Form Contato";
		$mail->Body = 'Name: '.$_POST['name'].
					'<br>Telefone: '.$_POST['telefone'].
					'<br>E-mail: '.$_POST['email'].
					'<br>Mensagem: '.$_POST['mensagem'];

		$enviado = $mail->Send();
		$mail->ClearAllRecipients();
		$mail->ClearAttachments();
 ?>
