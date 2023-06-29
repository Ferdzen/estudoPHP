<?php 
session_start();
include 'includes/connection.php';
include 'includes/funcoes.php';
$debug = '1';
$login = mysqli_real_escape_string($con, $_POST['login']);
$senha = mysqli_real_escape_string($con, $_POST['senha']);
$senha_hash = hash('sha256', $senha);
$sql = "SELECT * FROM usuario WHERE `login` ='$login' AND `senha` = '$senha_hash'";
if ($debug == '1'){ echo "Login $login - Senha $senha senha_hash $senha_hash  - SQL $sql <br>"; }

$result = mysqli_query($con, $sql);
$num_rows = mysqli_num_rows($result);
if ($num_rows == 0){
	echo "Nao encontrado, voltando para pagina de login";
	header('location: login.php');
	exit;
}else{
	echo "Encontrado redirecionando para sistema";
	$_SESSION['validacao'] = '1';
	$_SESSION['login'] = $login;

	salva_log($login, $_SERVER['REMOTE_ADDR'], 'Usuario logou no sistema');
	header('location: index.php');
}
?>