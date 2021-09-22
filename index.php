<?php
	include 'assets/header.php'
?>
	<!-- Styles -->
	<link rel="stylesheet" href="assets/style3.css">
</head>

<body>

	<h1>Cadastro de Clientes</h1>
	
	<a href="clientes/adicionar.php">
		<input type="button" value="Adicionar">
	</a>
	<br/>
	<a href="clientes/pesquisar.php">
		<input type="button" value="Pesquisar">
	</a>
	<br/>

	<h1>Tabela dos Formulários</h1>
    <table class="content-table" >
        <thead>
            <tr>
                <th>ID</th>
				<th>Nome</th>
				<th>Email</th>
				<th>Idade</th>
				<th>CPF</th>
				<th>Celular</th>
				<th>Ação</th>
            </tr>
        </thead>

		<?php 
		// conexao com o banco de dados
		require("clientes/conecta.php");
		
		// executar comandos sql
		// consulta registros da tabela
		$query = $mysqli->query("select * from tb_clientes");
		echo $mysqli->error;

		// carrega consulta de registros
		while ($tabela = $query->fetch_assoc()){
		$idcli = $tabela["idcli"];
		echo "
        <tbody>
            <tr align='center' onclick=location.href='clientes/calcula.php?id=$idcli'>
				<td align='center'>$tabela[idcli]</td>
				<td align='center'>$tabela[nomecli]</td>
				<td align='center'>$tabela[emailcli]</td>
				<td align='center'>$tabela[idadecli]</td>
				<td align='center'>$tabela[cpfcli]</td>
				<td align='center'>$tabela[celcli]</td>
				
				<td width='120'><a href='excluir.php?excluir=$tabela[idcli]'>[excluir]</a>
				
				<a href='alterar.php?alterar=$tabela[idcli]'>[alterar]</a></td>
            </tr>
        </tbody>
		";
		}
		?>
    </table>

</body>
</html>