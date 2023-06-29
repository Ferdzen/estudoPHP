 <?php

if( empty($_GET['usuario']) || empty($_GET['confirmacao']) ){
	die ('<p><h2>Não é possível alterar a senha: dados em falta</p></h2>');
}

//echo "verificando dados";
include("sistema/includes/conectar.php");
$usuario = mysqli_real_escape_string($con, $_GET['usuario']);
$chave = mysqli_real_escape_string($con, $_GET['confirmacao']);
$validade = date("d-m-Y");
$q = mysqli_query($con, "SELECT COUNT(*) FROM recupera_senha WHERE usuario = '$usuario' AND chave = '$chave' and validade = '$validade'");
 
if( mysqli_num_rows($q) == "1"  ){
	
// os dados estão corretos: eliminar o pedido e permitir alterar a password
//ainda nao vou eliminar o registro, pois vou eliminar no sql, para evitar tentantiva direta no arquivo sql.php
//mysql_query("DELETE FROM recupera_senha WHERE utilizador = '$utilizador' AND confirmacao = '$confirmacao'");
//echo 'Sucesso! (Mostrar formulário de alteração de password aqui)';   
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
	<title>PEOPLE SYSTEM - Cadastre tudo, não perca nada</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta name="description" content="">
  	<meta name="author" content="Fernanda Inacio, IFPR Ivaiporã">
  	<link rel="shortcut icon" href="sistema/img/favicon.gif">
  	<script src="js/secure.js"></script>
  	
  	<link href="sistema/css/bootstrap.min.css" rel="stylesheet">
	 <link href="sistema/css/style.css" rel="stylesheet">
	 	<script type="text/javascript" src="js/secure.js"></script>
			<script type="text/JavaScript">
			<!--
			// criptografa o login e a senha no envio
			function criptoform() {
			var a = document.loginform.pass.value;
			var b = document.loginform.pass1.value;
			
			if (( a == '' ) || ( b == '')) {
			alert ("senha em branco");
			return false;
			}			
			if ( a != b ){
			alert ("senhas nao conferem");
			return false;
			}
			document.loginform.pass.value =  SHA256(document.loginform.pass.value);
			document.loginform.pass1.value =  SHA256(document.loginform.pass1.value);
			
			}
			-->
			</script>
</head>
<body>
	<div class="container">
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                  
    <div class="panel panel-success" >
    <div class="panel-heading">
    <div class="panel-title">Atualizar Senha</div>
    <div style="float:right; font-size: 80%; position: relative; top:-10px">
    <div align="right"></div>
    </div>
    </div>     
    <div style="padding-top:30px" class="panel-body " >
	<form name="loginform" id="loginform" class="form-horizontal" action="recuperar_banco.php" method="post" onSubmit="return criptoform()">
    
    <div style="margin-bottom: 25px" class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="pass1" name="pass1" type="password" class="form-control" placeholder="nova senha">
	</div>

	<div style="margin-bottom: 25px" class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="pass" name="pass" type="password" class="form-control" placeholder="repita a nova senha">
    <input id="usuario" name="usuario" type="hidden" value="<?php echo $usuario; ?>">
	</div>
                    
    <div style="margin-top:10px" class="form-group">
    <!-- Button -->
	<div class="col-sm-12 controls">
    <input type="submit" name="submit" value="Alterar Senha" class="btn btn-default" />
    </div>
    </div>
    </form>
    </div>                     
    </div>  
    </div>
	
	</div>
	
</body>
</html>
       
<?
}
?>

		