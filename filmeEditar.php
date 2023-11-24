<?php


require_once "Class/Filme.php";


$id = isset($_GET['id']) ? $_GET['id'] : null;

// Verifica se o ID está definido e não é vazio
if ($id !== null && $id !== "") {
    $filme = new Filme($id);

} else {
    echo "ID não fornecido ou inválido.";
}

require 'Class/Usuario.php';
    $diretor = new Usuario();
    $lista = $diretor->listar(); 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Filme</title>
</head>
<body>
    <h1>Sistema Filmes</h1>
    <h2>Atualizar Filme</h2>
    <form action="filmeEditarGravar.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $filme->id ?>">
        <label for="titulo">Título:</label>
        <input type="text" name="txtTitulo" id="titulo" value="<?= $filme->titulo ?>">
        <br><br>
        <label for="sinopse">Sinopse:</label>
        <textarea name="txtSinopse" id="sinopse" rows="4" cols="30"><?= $filme->sinopse ?></textarea>
        <br><br>
        <label for="anoLancamento">Ano de Lançamento:</label>
        <input type="number" name="numAnoLancamento" id="anoLancamento" value="<?= $filme->anoLancamento ?>">
        <br><br>
        <!-- Adicione outros campos conforme necessário -->
        
        <label for="duracao">Duração:</label>
        <input type="number" name="txtDuracao" id="duracao" value="<?= $filme->duracao ?>">
        <br><br>
        <label for="notaImdb">Nota IMDb:</label>
        <input type="text" name="txtNotaImdb" id="notaImdb" value="<?= $filme->notaImdb ?>">
            <br><br>
        <label for="diretor">Diretor:</label>
        <select name="selDiretor" id="diretor">
        <option value="">Selecione... </option>
            <?php
                foreach ($lista as $linha):
                    echo "<option value='{$linha['id']}'>
                                          {$linha['nome']}
                           </option>";
                endforeach
            ?>
        <option value="" <?= ($filme->diretor_id == '') ? 'selected' : '' ?>>Nenhum Diretor Selecionado</option>
        </select>
            <br><br>
        <label for="foto">Foto:</label>
        <input type="file" name="imgFoto" id="foto">
        <br><br>

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
