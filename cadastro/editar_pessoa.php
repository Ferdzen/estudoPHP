<?php
$id_pessoa = mysqli_real_escape_string($con, $_GET['id_pessoa']);
$xyz = "SELECT * FROM `tb_pessoa` WHERE id_pessoa = '$id_pessoa'";
echo "$xyz <br>";

$abc = mysqli_query($con, $xyz);
$pessoa = mysqli_fetch_array($abc, MYSQLI_BOTH);
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar pessoa</title>
</head>

<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-12">
            <h1>PÁGINA EDITAR PESSOA</h1>

            <form method="GET" action="controle.php">
                <div class="form-group">
                    <label for="id_pessoa"> ID: </label>
                    <input type="text" class="form-control" name="id_pessoa" value="<?php echo $pessoa['id_pessoa'];?>" readonly="true">
                    <input type="hidden" name="operacao" value="editar_pessoa">
                </div>
                <div class="form-group">
                    <label for="nome"> Nome: </label> 
                    <input type="text" class="form-control" name="nome" value="<?php echo $pessoa['nome'];?>">
                </div>
                    
                <div class="form-group">
                    <label for="cpf"> CPF: </label>
                    <input type="text" class="form-control" name="cpf" value="<?php echo $pessoa['cpf'];?>"> 
                </div>
                <div class="form-group">
                    <label for="rg"> RG: </label>
                    <input type="text" class="form-control" name="rg" value="<?php echo $pessoa['rg'];?>"> 
                </div>
                <div class="form-group">
                    <label for="celular"> Celular: </label>
                    <input type="text" class="form-control" name="celular" value="<?php echo $pessoa['celular'];?>"> 
                </div>
                
                <div class="form-group"> 
                    <label for="email"> E-mail: </label>   
                    <input type="text" class="form-control" name="email" value="<?php echo $pessoa['email'];?>"> 
                </div>
                
                <div class="form-group">  
                    <label for="endereco"> Endereço: </label>  
                    <input type="text" class="form-control" name="endereco" value="<?php echo $pessoa['endereco'];?>"> 
                </div>
                
                <div class="form-group">    
                    <label for="id_pessoa"> Observação: </label>
                    <input type="text" class="form-control" name="obervacao" value="<?php echo $pessoa['observacao'];?>"> 
                </div>
                <input type="submit" value="Editar">


            </form>
</div>
    </div>
        </div>