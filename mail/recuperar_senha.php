<!DOCTYPE html>
<html lang="pt_br">
<head>
	<title>Sistema de Cadastro de Pessoas</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta name="description" content="">
  	<meta name="author" content="Henrique Golinelli, IFPR Ivaiporã, CODESI, ACISI">
  	
  	<script src="js/secure.js"></script>
	 	
</head>
<body>
	<div class="container">
    <div align="center">
              <h1>RECUPERE SUA SENHA</h1> </br>
            </div>
		<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-success" >
            <div class="panel-heading">
            <div class="panel-title">Recuperar Senha</div>
            <div style="float:right; font-size: 80%; position: relative; top:-10px">
              <div align="right">
             </div>
             </div>
            </div>     
            <div style="padding-top:30px" class="panel-body " >
              
              <div class="alert alert-warning"> Olá, para redefinir sua senha digite o e-mail cadastrado e clique em recuperar. Logo após verifique o e-mail em sua caixa de entrada/spam. </div>


				<form name="loginform" id="loginform" class="form-horizontal" action="recuperar_senha2.php" method="post" >
                	<div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="usuario" name="usuario" type="text" class="form-control" placeholder="usuario ou email">                                        
                    </div>
                    
                    <div style="margin-top:10px" class="form-group">
                    <!-- Button -->
	                <div class="col-sm-12 controls">
                    <input type="submit" name="submit" value="Recuperar" class="btn btn-dark" />
                    </div>
                    </div>
                </form>
            </div>                     
            </div>  
       </div>

	</div>
	
</body>
</html>
       