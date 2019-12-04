<?php
$assunto=$_POST["inputAssunto"];
$nome=$_POST["inputNome"];
$email=$_POST["inputEmail"];
$telefone=$_POST["inputTel"];
$mensagem=$_POST["inputMensagem"];

$mail_destino		= "Assis@rediscover.com.br";
$site   = "Assis@rediscover.com.br"; 
//Mensagem de cabeçalho do email
$mail_header		= "From: $email\nContent-Type: text/html;charset=\"utf-8\" Content-Transfer-Encoding: quoted-printable";
$mail_header2		= "From: $site\nContent-Type: text/html;charset=\"utf-8\" Content-Transfer-Encoding: quoted-printable";
//Mensagem para o email de resposta
$msg_reply			= "<h1>Olá $nome, recebemos o seu email com o assunto <b>$assunto</b>. Obrigado por entrar em contato.</h1>";

//Mensagem de Erro
$msg_erro			= "Atenção!! Os campos <b>Nome, Mensagem e E-mail</b> não podem estar em branco.";


//Testa campos obrigatórios
$data      = date("d/m/y");
$hora      = date("H:i");
if ($nome!="" and $mensagem!="" and $email!="")
	{
    $msg = "";
	$msg.="<b>Nome: </b>$nome\n<br>";
	$msg.="<b>E-mail: </b>$email - <b>Telefone: </b>$telefone<br>";
	$msg.="<b>Assunto: </b>$assunto\n<br>";
	$msg.="<b>Mensagem: </b>$mensagem\n<br>";
	$msg.="<b>Data:</b> $data - <b>Hora:</b> $hora \n<br>";
	$msg.="<b><center>E-mail enviado a partir do site www.kffkempreendimentos.com.br</center></b><br>";

	if (@ mail ($mail_destino, "Contato pelo site: ".$assunto, $msg, $mail_header))
		{
		//Imprimindo confirmação de envio
			echo "<center> <h4>Olá <b> $nome</b>, sua mensagem foi enviada com sucesso!<br>";
			echo "Obrigado por entrar em contato!</center></h4>";
		//Enviando mensagem de confirmação para o email do internauta
		$site   = "Assis@rediscover.com.br"; 
		$msg2    = "Olá $nome, recebemos sua mensagem: <br> $msg <br> Em breve lhe retornaremos o contato. <br> Att. <br> KFFK Empreendimentos - (47) 99264-9157";
		@ mail ($email, "Contato pelo site: ".$assunto, $msg2, $mail_header2);
/*		mail("$email",
     "Re: Contato pelo site",
     "$msg2",
     "$mail_header2"
    );*/
		}
		else
		echo
			"
			<meta http-equiv=refresh content=5;URL=index.php>
			</html><center><br><br><font color=red>
			<b>Erro ao enviar e-mail!</b>
			</font></center>
			";
	}
else
	{
	//Alerta sobre os campos obrigatórios
	echo 
		"
		<center>
		$msg_erro <br>
		Por favor, preencha corretamente.
		</center>
		";
	}
?>


