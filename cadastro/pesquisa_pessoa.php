<html>
<body>
<div class="container" style="margin-top:30px">
<div class="row">
    <div class="col-sm-12">
    <h1>PÁGINA PESSOAS</h1> 

    <form method="GET" action="pesquisa_pessoa.php">
    <input type="text" name="nome" id="nome" placeholder="Pesquise...">
    <input type="submit" value="Pesquisar">
    </form>
    <br>
    <br>
    
            <?php
                include 'includes/connection.php';
                if(isset($_GET['nome'])){
                    echo "Pesquisando...";
                    $nome = $_GET['nome'];

                    $termos = explode("", $nome);
                    $termos_qtd = count($termos);
                    echo "<br>QTD de termos $termos_qtd<br>";

                    //$consulta = "SELECT * from tb_pessoa WHERE tb_pessoa like '%$nome%'";
                    //echo "$consulta";
                   // $executa = mysqli_query($con, $consulta);
                    /*
                    while($pessoas=mysqli_fetch_array($executa, MYSQLI_BOTH)){
                        echo "$pessoas[tb_pessoa]";
                    }*/
                
                    switch ($termos_qtd) {
                        case '1':
                            $consulta="SELECT * FROM `tb_pessoa` WHERE nome like '%$nome%' order by medico ASC";
                            break;
                        
                        case '2':
                            $consulta="SELECT * FROM `tb_pessoa` WHERE nome like '%$nome%' OR (nome like '%$termos[0]%' AND nome like '%$termos[1]%') order by nome ASC";
                            break;
                            
                        default:
                            $consulta = "SELECT * from `tb_pessoa` WHERE nome like '%$nome%'";
                            break;
                    }
                }
                
                
                
            ?>

</div>


</div>
</div>

</body>
</html>