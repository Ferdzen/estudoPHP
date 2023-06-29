<?php 
// funcoes


function salva_log($login, $ip, $mensagem){

include 'includes/connection.php';

$sql = "INSERT INTO log (`login`, `ip`, `mensagem`) values ('$login', '$ip', '$mensagem')";
echo "$sql";

$exec = mysqli_query($con, $sql);

}
?>