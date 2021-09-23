<?php 
    
	session_start();
	
	// Variaveis de erro
	$erro_nome      = "";
	$erro_email     = "";
	$erro_idade     = "";
	$erro_cpf       = "";
	$erro_cel       = "";
	$erro_validacao = 0;


	if(isset($_POST["botao"])){
		// Recebendo variaveis
		
		$_SESSION["nome"]   =   $_POST["nomecli"];
		$_SESSION["email"]  =   $_POST["emailcli"];
		$_SESSION["idade"]  =   $_POST["idadecli"];
        $_SESSION["cpf"]    =   $_POST["cpfcli"];
        $_SESSION["cel"]    =   $_POST["celcli"];

		$nomecli	=	htmlentities($_POST["nomecli"]);
		$emailcli	=	htmlentities($_POST["emailcli"]);	
		$idadecli	=	htmlentities($_POST["idadecli"]);	
		$cpfcli		=	htmlentities($_POST["cpfcli"]);	
		$celcli		=	htmlentities($_POST["celcli"]);	

		// Sanitizações
		$nomecli   = 	filter_var($nomecli  , FILTER_SANITIZE_SPECIAL_CHARS);
		$emailcli  = 	filter_var($emailcli , FILTER_SANITIZE_EMAIL);
		$idadecli  = 	filter_var($idadecli , FILTER_SANITIZE_NUMBER_INT);
		$cpfcli    = 	filter_var($cpfcli   , FILTER_SANITIZE_NUMBER_INT);
		$celcli    = 	filter_var($celcli   , FILTER_SANITIZE_NUMBER_INT);

		// Validações
		if ($nomecli == "") {
			$erro_nome = "(Preencha o nome corretamente)";
			$erro_validacao ++;
		}
		if ($emailcli == "") {
			$erro_email = " (Preencha o email corretamente)";
			$erro_validacao ++;
		}
		if ($idadecli < 1) {
			$erro_idade = " (Idade precisa ser inteiro)";
			$erro_validacao ++;
		}
		if ($cpfcli < 1) {
			$erro_cpf = " (CPF precisa ser inteiro)";
			$erro_validacao ++;
		}
		if ($celcli < 1 ) {
			$erro_cel = " (Celular precisa ser inteiro)";
			$erro_validacao ++;
		}

	}
	
	include '../assets/header.php'
?>

<body>

	<main class="container">

	<h2>Dados Cadastrais</h2>
	<form method="POST" action="adicionar.php">
		<div class="input-field">
			<input type="text"      name="nomecli" 	maxlength="40" 
			value="<?php 
					if (isset($nomecli)) 
					echo $nomecli 
					?>"
			placeholder="Nome<?php echo $erro_nome?>"> 
			<div class="underline"></div>
		</div>
		<div class="input-field">
			<input type="email"     name="emailcli" maxlength="40" 
			value="<?php 
					if (isset($emailcli)) 
					echo $emailcli 
					?>"
					
			placeholder="Email<?php echo $erro_email?>">
			<div class="underline"></div>
		</div><br>
		<div class="input-field">
			<input type="text"  	name="idadecli" maxlength="3" 
			value="<?php 
					if (isset($idadecli)) 
					echo $idadecli 
					?>"
			placeholder="Idade<?php echo $erro_idade?>">
			<div class="underline"></div>
		</div><br>
		<div class="input-field">
			<input type="text"      name="cpfcli" 	maxlength="15" 
			value="<?php 
					if (isset($cpfcli)) 
					echo $cpfcli 
					?>"
			placeholder="CPF<?php echo $erro_cpf?>">
			<div class="underline"></div>
		</div><br>
		<div class="input-field">
			<input type="text"      name="celcli"  	maxlength="17" 
			value="<?php 
					if (isset($celcli)) 
					echo $celcli 
					?>"
			placeholder="Celular<?php echo $erro_cel?>">
			<div class="underline"></div>
		</div>
		<input type="submit" value="✔️ Salvar" name="botao">
		<a href="../index.php">
            <input type="button" value="⬅️ Voltar">
        </a>
	</form>
	</main>

</body>
</html>

<?php

	if(isset($_POST["botao"])){
		require("../conecta.php");

		// SEM ERRO DE VALIDAÇÃO => VAI PARA PROXIMA ETAPA
		if ($erro_validacao == 0) {
			// gravando dados
			$mysqli->query("insert into tb_clientes values('', '$nomecli', '$emailcli', '$idadecli', '$cpfcli', '$celcli')");
			echo $mysqli->error;

			if($mysqli->error == ""){
				// Header("location: ../index.php");
				Header("location: mostra_dados.php");
			}
		}

	}
?>
