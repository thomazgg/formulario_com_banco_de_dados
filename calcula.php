<?php 

    // conexao com o banco de dados
    require("conecta.php");

    $idcli   = htmlentities($_GET["id"]);

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
    <link rel="stylesheet" type="text/css" href="../assets/style4.css">
</head>

<body>

    <main class="container">

        <h2>Dados Cadastrais</h2>

        <div>
            <div class="field">
                <div class="campo">
                    <?php 
                    // executar comandos sql
                    // consulta registros da tabela
                    $query = $mysqli->query("select * from tb_clientes where idcli = '$idcli'");
                    echo $mysqli->error;

                    while ($tabela = $query->fetch_assoc()){
                        echo "<h3>Dados do Cliente</h3>";
                        echo "Nome:     $tabela[nomecli] </br>";
                        echo "Email:    $tabela[emailcli] </br>";
                        echo "Idade:    $tabela[idadecli] </br>";
                        echo "CPF:      $tabela[cpfcli] </br>";
                        echo "Celular:  $tabela[celcli] </br>";
                    }
                    ?>
                    <div class="underline"></div>
                </div>
            </div><br>
            
    </main>
</body>
</html>