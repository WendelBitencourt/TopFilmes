<?php
    require 'Class/Usuario.php';
    $diretor = new Usuario();
    $lista = $diretor->listar(); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Filmes</title>
    <link rel="stylesheet" href="css/filmes-inserir.css">
</head>
<body>
    <h1>Sistema Filmes</h1>
    <h2>Cadastro de filmes</h2>
    
    <form action="filmeGravar.php" method="POST" enctype="multipart/form-data">
        
        <br><br>
        <label for="titulo">Titulo: </label><br><br>
        <input type="text" name="txtTitulo">
            <br><br>
        <label for="sinopse">Sinopse: </label><br><br>
        <textarea type="text" name="txtSinopse" rows="5" cols="40"></textarea>
            <br><br>
        <label for="anoLancamento">Ano do lançamento: </label><br><br>
        <input type="number" name="anoLancamento">
            <br><br>
        <label for="duracao">Duração: </label><br><br>
        <input type="number" name="duracao">
            <br><br>
        <label for="nota_imdb">Nota no IMDB: </label><br><br>
        <input type="text" name="nota_imdb" id="nota_imdb" pattern="[0-9]+(\.[0-9]+)?" title="Informe um número decimal válido">
            <br><br>
        <label for="imgFoto">Foto:</label><br><br>
        
        <div class="centralizar">
            <input type="file" name="imgfoto">
        </div><br><br>
        
    
        <label for="seldiretor">Diretores: </label><br><br>

        <select name="seldiretor">
            <option value="">Selecione... </option>
            <?php
                foreach ($lista as $linha):
                    echo "<option value='{$linha['id']}'>
                                          {$linha['nome']}
                           </option>";
                endforeach
            ?>
        </select><br><br><br>

        <input type="submit" value="Inserir"><br><br>
        
        <button type="button"><a href="index.html">Voltar</a></button>
    </form>
    
</body>
</html>