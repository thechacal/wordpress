<?php

		require "libs/phpmailer/class.phpmailer.php";
		require "libs/phpmailer/PHPMailerAutoload.php";

		$mail = new PHPMailer();

		$mail->SMTPDebug = 3;

		$mail->isSMTP();

		$mail->SMTPOptions = array(
		    'ssl' => array(
		        'verify_peer' => false,
		        'verify_peer_name' => false,
		        'allow_self_signed' => true
		    )
		);

		$mail->Host = "mail.quadradigital.com.br";
		$mail->SMTPAuth = true;
		$mail->Username = 'formularios@quadradigital.com.br';
		$mail->Password = 'quadra2014*';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		$mail->CharSet = "uft-8";
		$mail->From = "noreply@aerotur.com.br";
		$mail->Sender = "formularios@quadradigital.com.br";
		$mail->FromName = "Aerotur";
		$mail->AddAddress('ramon@oakz.org', 'Aerotur Teste Form Contato');
		$mail->IsHTML(true);
		$mail->Subject  = "Aerotur Teste Form Contato";
		$mail->Body = 	'Nome: '.$_POST['inputNome'].
						'<br>Cidade: '.$_POST['inputCidade'].
						'<br>Telefone fixo: '.$_POST['inputTelefone'].
						'<br>Para onde você quer viajar?: '.$_POST['inputDestino'].
						'<br>Cidade de embarque: '.$_POST['inputEmbarque'].
						'<br>Quantas pessoas: '.$_POST['inputPessoas'].
						'<br>Observações: '.$_POST['inputObservacoes'].
						'<br>Email: '.$_POST['inputEmail'].
						'<br>Estado: '.$_POST['inputUF'].
						'<br>Celular: '.$_POST['inputCelular'].
						'<br>Data de ida: '.$_POST['inputIDA'].
						'<br>Data de volta: '.$_POST['inputVolta'].
						'<br>Tipo de viagem: '.$_POST['inputTipo'].
						'<br>Forma de contato: '.$_POST['inputForma'];
		$enviado = $mail->Send();
		$mail->ClearAllRecipients();
		$mail->ClearAttachments();
 ?>