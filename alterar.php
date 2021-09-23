<?php 
	require("../conecta.php");
	$nomecli="";
	$emailcli="";
	$idadecli="";
	$cpfcli="";
	$celcli="";

	if(isset($_GET["alterar"])){
		$idcli = htmlentities($_GET["alterar"]);
		$query=$mysqli->query("select * from tb_clientes where idcli = '$idcli'");
		$tabela=$query->fetch_assoc();
		$nomecli=$tabela["nomecli"];
		$emailcli=$tabela["emailcli"];
		$idadecli=$tabela["idadecli"];
		$cpfcli=$tabela["cpfcli"];
		$celcli=$tabela["celcli"];
	}
	
	include '../assets/header.php'
?>

<body>
	<form method="POST" action="alterar.php">
			<input type="hidden"	name="idcli" 	value="<?php echo $idcli ?>">	
		nome: 	<input type="text" 	name="nomecli" 	value="<?php echo $nomecli ?>">
		email: 	<input type="text" 	name="emailcli" value="<?php echo $emailcli ?>">
		idade: 	<input type="text" 	name="idadecli" value="<?php echo $idadecli ?>">
		cpf: 	<input type="text" 	name="cpfcli" 	value="<?php echo $cpfcli ?>">	
		cel: 	<input type="text" 	name="celcli" 	value="<?php echo $celcli ?>">	
		<input type="submit" value="Salvar" name="botao">
		<a href ="../index.php">
			<input type="button" value="Voltar" name="botao">
		</a>

	<?php 
		if(isset($_POST["botao"])){

			$idcli   	= 	htmlentities($_POST["idcli"]);
			$nomecli	=	htmlentities($_POST["nomecli"]);
			$emailcli	=	htmlentities($_POST["emailcli"]);	
			$idadecli	=	htmlentities($_POST["idadecli"]);	
			$cpfcli		=	htmlentities($_POST["cpfcli"]);	
			$celcli		=	htmlentities($_POST["celcli"]);

			$mysqli->query("update tb_clientes set 
			nomecli	='$nomecli', 
			emailcli='$emailcli', 
			idadecli = '$idadecli', 
			cpfcli = '$cpfcli', 
			celcli = '$celcli' 
			where idcli = '$idcli'");
			echo $mysqli->error;
			if ($mysqli->error == "") {
				echo "<div class='alerta sucesso'><b>Alterado</b> com sucesso.";
			}
		}
	?>

	</form>
</body>
</html>
