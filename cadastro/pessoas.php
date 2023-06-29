<div class="container" style="margin-top:20px">
	<div class="row">
    	<div class="col-sm-12">
       	<h3> PAGINA PESSOAS </h3>
       	<a href="index.php?operacao=nova_pessoa"><button class="btn btn-dark"> Nova Pessoa</button></a>
       	
       	<table class="table table-bordered table-striped table-sm">
       	<thead>
	      	<tr>
	        <th>Nome</th>
	        <th>e-mail</th>
	        <th>celular</th>
	        <th>editar</th>
	        <th>excluir</th>
	      	</tr>
    	</thead>
    	<tbody>
		<?php
      	$cst ="SELECT * from `pessoa` order by nome ASC";
		$re=mysqli_query($con, $cst);
		while ($linha = mysqli_fetch_array($re, MYSQLI_BOTH)){
		echo "<tr> <td>$linha[nome]</td>
		<td>$linha[email] </td> 
		<td>$linha[celular] </td>
		<td><a href='index.php?operacao=edita_pessoa&id_pessoa=$linha[id_pessoa]'><button class='bnt btn-sm'>Editar</button> </a></td>
		<td><a href='controle.php?operacao=excluir_pessoa&id_pessoa=$linha[id_pessoa]'><button class='btn btn-sm btn-danger'> excluir</button> </a></td>
		</tr>";
			} ?>
		</tbody>
		</table>
      	
      	</div>
    </div>
</div>