<?php
	include '../assets/header.php'
?>
	<!-- Styles -->
	<link rel="stylesheet" href="../assets/style.css">
</head>

<body>
	<form method="POST" action="pesquisar.php">
		Nome do Cliente: <input type="text" name="nomecli" maxlength="40" placeholder="digite o nome">
		<input type="submit" value="pesquisar" name="botao">
	</form>

	<?php 
		if(isset($_POST["botao"])){
			require("conecta.php");
			$nomecli=htmlentities($_POST["nomecli"]);

			// gravando dados
			$query = $mysqli->query("select * from tb_clientes where nomecli like '%$nomecli%'");
			echo $mysqli->error;

			echo "
				<table border='1' width='400'>
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
			";
			while ($tabela=$query->fetch_assoc()) {
				echo "
				<tbody>
				<tr align='center'>
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
		echo "</table>";
		}
	?>
	<a href="../index.php">
		<input type="button" value="Voltar">
	</a>
</body>
</html>