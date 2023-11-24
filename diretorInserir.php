<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Diretor</title>
    <link rel="stylesheet" href="css/estilo_diretor.css">
    
</head>
<body>
    <h1>Sistema Filmes </h1>
    <h2>Cadastro de Diretor</h2>
    <form action="diretoresGravar.php" method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" name="txtNome" id="nome" required>
        <br><br>
        <label for="minibio">Mini-Biográfia: </label><br>
        <textarea type="text" name="txtMinibio" id="minibio" rows="4" cols="30"></textarea>
        <br><br>
        <label for="anoNasc">Ano de Nascimento: </label><br>
        <input type="number" name="numAnoNasc" id="nome" required>
        <br><br>
        <input type="submit" value="Cadastrar">
        
        <button type="button"><a href="index.html" class="voltar">Voltar</a></button>
    </form>
    <br><br>
    
</body>
</html>