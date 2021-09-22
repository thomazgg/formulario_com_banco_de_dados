<?php 
	require("conecta.php");
	$cpfcli="";
	$nomecli=""; 

	if(isset($_GET["alterar"])){
		$idcli = htmlentities($_GET["alterar"]);
		$query=$mysqli->query("select * from tb_clientes where idcli = '$idcli'");
		$tabela=$query->fetch_assoc();
		$cpfcli=$tabela["cpfcli"];		
		$nomecli=$tabela["nomecli"];
	}
?>


<?php
	include '../assets/header.php'
?>
	<!-- Styles -->
	<link rel="stylesheet" href="../assets/style.css">
</head>

<body>
	<form method="POST" action="alterar.php">
		<input type="hidden" name="idcli" value="<?php echo $idcli ?>">
		cpf: <input type="text" name="cpfcli" value="<?php echo $cpfcli ?>">
		<br/><br/>			
		nome: <input type="text" name="nomecli" value="<?php echo $nomecli ?>">
		<input type="submit" value="Salvar" name="botao">

	</form>
	<a href ="index.php"> Voltar </a>
	<br />
</body>
</html>


<?php 
	if(isset($_POST["botao"])){

		$idcli   = htmlentities($_POST["idcli"]);
		$cpfcli  = htmlentities($_POST["cpfcli"]);
		$nomecli = htmlentities($_POST["nomecli"]);

		$mysqli->query("update tb_clientes set cpfcli = '$cpfcli', nomecli='$nomecli' where idcli = '$idcli'  ");
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>