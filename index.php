<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="sortcut icon" href="assets/img/form.png" />

    <title>Formulario com BD</title>
    
    <!-- Styles -->
	<link rel="stylesheet" href="assets/style.css">
</head>

<body>
	<!-- <div id="progressbar"></div>
	<div id="scrollPath"></div> -->
	<main class="row justify-content-center">
		<div class="column">
			<table class="content-table" >
				<h1>Tabela dos Clientes</h1>
				<a href="clientes/adicionar.php">
					<input type="button" value="➕ Adicionar Cliente">
				<a href="clientes/pesquisar.php">
					<input type="button" value="🔎 Pesquisar Cliente">
				</a><br/><br/>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Email</th>
					<th>Idade</th>
					<th>CPF</th>
					<th>Celular</th>
				</tr>
			</thead>

			<?php 
				// conexao com o banco de dados
				require("conecta.php");
				
				// executar comandos sql
				// consulta registros da tabela
				$query = $mysqli->query("select * from tb_clientes");
				echo $mysqli->error;

				// carrega consulta de registros
				while ($tabela = $query->fetch_assoc()){
				$idcli = $tabela["idcli"];
				echo "
				<tbody>
					<tr onclick=location.href='clientes/calcula.php?id=$idcli'>
					
						<td align='center'>$tabela[idcli]</td>
						<td align='center'>$tabela[nomecli]</td>
						<td align='center'>$tabela[emailcli]</td>
						<td align='center'>$tabela[idadecli]</td>
						<td align='center'>$tabela[cpfcli]</td>
						<td align='center'>$tabela[celcli]</td>
					</tr>
				</tbody>
				";
				}
			?>
			</table>
		</div>
		<div class="column">
			<table class="content-table" >
				<h1>Tabela dos Produtos</h1>
				<a href="produtos/adicionar.php">
					<input type="button" value="➕ Adicionar Produto">
				<a href="produtos/pesquisar.php">
					<input type="button" value="🔎 Pesquisar Produto">
				</a><br/><br/>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Tipo</th>
					<th>Qualidade</th>
					<th>Quantidade</th>
					<th>Preço</th>
				</tr>
			</thead>

			<?php 
				// conexao com o banco de dados
				require("conecta.php");
				
				// executar comandos sql
				// consulta registros da tabela
				$query = $mysqli->query("select * from tb_produtos");
				echo $mysqli->error;

				// carrega consulta de registros
				while ($tabela = $query->fetch_assoc()){
				$idprod = $tabela["idprod"];
				echo "
				<tbody>
					<tr onclick=location.href='produtos/calcula.php?id=$idprod'>
					
						<td align='center'>$tabela[idprod]</td>
						<td align='center'>$tabela[nomeprod]</td>
						<td align='center'>$tabela[tipoprod]</td>
						<td align='center'>$tabela[qualidadeprod]</td>
						<td align='center'>$tabela[qtdestoqueprod]</td>
						<td align='center'>$tabela[precoprod]</td>
					</tr>
				</tbody>
				";
				}
			?>
			</table>
		</div>
	
		<!-- JavaScript -->
		<script src="app.js"></script>

	</main>
</body>
</html>
