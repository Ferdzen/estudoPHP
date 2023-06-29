<?php
$mail_usuario='felipezubkosi2022@outlook.com';
$mail_senha='123aluno';
$IP=$_SERVER['REMOTE_ADDR'];


if( empty($_POST['usuario']) ){
	die ('<p><h2>Não é possível alterar a senha: dados em falta</p></h2>');
	echo " URL= http://alunos.suportelab.com.br:15000/alunos/felipe/Sistema/login.php\">";
}

//echo "verificando dados";

include("../includes/connection.php");
include("recuperar_senha.php");

$consulta='';
$usuario='';
		
//echo "obtendo usuario" ;
$usuario=mysqli_real_escape_string($con, $_REQUEST['usuario']);
//formando consulta SQL
$consulta="select * from usuario where login = '$usuario'";
//realizando consulta SQL
$cst_recuperacao=mysqli_query($con, $consulta);
		
if( mysqli_num_rows($cst_recuperacao) == 1 ){
	$validade = date("d-m-Y");
	$agora=date("H:i:s");
			
	$chave = sha1(uniqid( mt_rand(), true));
	$uid = sha1(uniqid( mt_rand(), true));
	$pass = sha1(uniqid( mt_rand(), true));

	//echo "</br> chave $chave, validade $validade $usuario </br></br>";

	$arquiva_solicitacao="INSERT INTO recupera_senha (usuario, chave, validade) VALUES ('${usuario}', '$chave', '$validade')";
	//echo "</br> $arquiva_solicitacao";
	$link="http://alunos.suportelab.com.br:15000/alunos/felipe/Sistema/mail/recuperar.php?uid=$uid&pass=$pass&usuario=${usuario}&confirmacao=$chave";
			//echo "$link";
				
	$executa=mysqli_query($con, $arquiva_solicitacao);

	//enviar email
	// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
	require("../phpmailer/class.phpmailer.php");

	// Inicia a classe PHPMailer
	$mail = new PHPMailer();

	// Define os dados do servidor e tipo de conexão
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsSMTP(); // Define que a mensagem será SMTP

	$mail->Host = "smtp.office365.com"; // Endereço do servidor SMTP
	$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
	$mail->SMTPSecure = "tls";
	$mail->Username = "$mail_usuario"; // Usuário do servidor SMTP
	$mail->Password = "$mail_senha"; // Senha do servidor SMTP

	// Define o remetente
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->From = "$mail_usuario"; // Seu e-mail
	$mail->FromName = "Recuperação de Senha"; // Seu nome

	// Define os destinatário(s)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->AddAddress("$usuario");
	$mail->AddAddress("$usuario");

	// Define os dados técnicos da Mensagem
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
	$mail->CharSet = 'utf8'; // Charset da mensagem (opcional)

	$xpto="Existe uma solicitação de recuperação de senha para seu usuário. </br> </br>
	Data: $validade </br>
	Hora: $agora </br>
	IP: $IP </br> </br>
	Para recuperar a senha acesse o <a href='$link'>LINK</a> <br>

	Caso tenha problema, copie e cole o link no navegador </br>
	$link </br> </br>

	Mensagem gerada automaticamente, não responda
	";

	// Define a mensagem (Texto e Assunto)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->Subject = "Recuperacao de Senha"; // Assunto da mensagem
	$mail->Body = "$xpto";
	$mail->AltBody = "$xpto";

	// Envia o e-mail
	$enviado = $mail->Send();

	// Limpa os destinatários e os anexos
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();

	// Exibe uma mensagem de resultado
	if ($enviado) {
		
		echo '<div align="center">
		</br> E-mail enviado com sucesso! </br>
		<img src="sistema/img/solidariza_logo.png"> </br>
        </br></br>E-mail enviado. Por favor, verifique sua caixa de entrada spam.</br>
        </div>';

	} else {
		echo "Não foi possível enviar o e-mail.<br /><br />";
		echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
	}

	//$mensagem="Mensagem de Aniversario E-MAIL: $destinatario_nome email: $destinatario_address "; // mensagem para log
	//salvalog($mensagem); // chamando funcao de inserir log
	
	}else{
	//echo "nao encontrado";
	echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"1; URL= index.php?erro=usuario-nao-encontrado\">";
}
?>