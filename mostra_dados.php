<?php 
	session_start();
    $nome	    =	htmlentities($_SESSION["nome"]);
    $email	    =	htmlentities($_SESSION["email"]);	
    $idade	    =	htmlentities($_SESSION["idade"]);	
    $cpf		=	htmlentities($_SESSION["cpf"]);	
    $cel		=	htmlentities($_SESSION["cel"]);	
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="sortcut icon" href="../assets/cadeado.png" />

    <title>Dados do Formulário</title>
    
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="../assets/style_all.css">
</head>

<body>

    <main class="container">

        <h2>Dados Cadastrais</h2>

        <div>
            <div class="field">
                <div class="campo">
                    <?php 
                        echo "<h3>Dados do Cliente</h3>";
                        echo "Nome:     $nome </br>";
                        echo "Email:    $email </br>";
                        echo "Idade:    $idade </br>";
                        echo "CPF:      $cpf </br>";
                        echo "Celular:  $cel </br>";
                    ?>
                    <div class="underline"></div>
                    <a href="adicionar.php">
                        <input type="button" value="Adicionar novo cadastro">
                    </a>
                    <a href="../index.php">
                        <input type="button" value="Voltar">
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
