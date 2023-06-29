<?php

include("../includes/connection.php");

$usuario = mysqli_real_escape_string($con, $_POST['usuario']);
$pass = mysqli_real_escape_string($con, $_POST['pass']);
$chave = mysqli_real_escape_string($con, $_POST['chave']);
$validade = date("d-m-Y");

//echo "usuario $usuario pass $pass chave $chave";

//echo "utilizador $utilizador pass $pass ";
		
$q = mysqli_query($con, "SELECT COUNT(*) FROM recupera_senha WHERE usuario = '$usuario' AND chave = '$chave' and validade = '$validade'");
 
if( mysqli_num_rows($q) == "1"  ){
	mysqli_query($con, "DELETE FROM recupera_senha WHERE usuario = '$usuario' AND chave = '$chave'");
	mysqli_query($con, "UPDATE usuario set senha = '$pass' where login = '$usuario'");
	echo "<h2>SENHA ALTERADA COM SUCESSO </h2>";
	echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"2; URL= ..\index.php\">";
} else {
	echo "erro algum dado inválido";
}// edita senha

?>