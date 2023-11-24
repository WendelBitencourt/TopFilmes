<?php

    require_once "Class/Usuario.php";

    // Obtém o valor do parâmetro "id" passado na URL via método GET
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    // Verifica se o ID está definido e não é vazio
    if ($id !== null && $id !== "") {
        $diretor = new Usuario($id);

    } else {
        echo "ID não fornecido ou inválido.";
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Diretor</title>
    <style>
        input#nome{
            width: 235px;
        }
    </style>
</head>
<body>
    <h1>Sistema Filmes </h1>
    <h2>Atualizar dados do Diretor</h2>
    <form action="diretorEditarGravar.php" method="post">
        <input type="hidden" name="id" value="<?= $diretor->id ?>">
        <label for="nome">Nome:</label><br>
        <input type="text" name="txtNome" id="nome">
        <br><br>
        <label for="minibio">Mini-Biográfia: </label><br>
        <textarea type="text" name="txtMinibio" id="minibio" rows="4" cols="30"></textarea>
        <br><br>
        <label for="anoNasc">Ano de Nascimento: </label><br>
        <input type="number" name="numAnoNasc" id="nome">
        <br><br>
        
        <input type="submit" value="Atualizar">

    </form>
</body>
</html>