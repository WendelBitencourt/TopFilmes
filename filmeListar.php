<?php
    require_once "Class/Filme.php";
    $filme = new Filme();
    $listaFilmes = $filme->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Filmes</title>
    <link rel="stylesheet" href="css/listar.css">
</head>
<body>
    <h1>Sistema Filmes</h1>
    <h3>Listar Filmes</h3>
    

    <table border="1">
        <tr>
            <th>Código</th>
            <th>Cartaz</th>
            <th>Título</th>
            <th>Sinopse</th>
            <th>Ano de Lançamento</th>
            <th>Duração</th>
            <th>Nota IMDb</th>
            <th>Diretor</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($listaFilmes as $linha): ?>
        <tr>
            <td><?php echo $linha['id'] ?></td>
            <td><img src="img/<?php echo $linha['img_cartaz'] ?>" alt="Foto do Filme" height="100"></td>
            <td><?php echo $linha['titulo'] ?></td>
            <td><?php echo substr($linha['sinopse'], 0, 100) . (strlen($linha['sinopse']) > 100 ? '...' : ''); ?></td>
            <td><?php echo $linha['ano_lancamento'] ?></td>
            <td><?php echo $linha['duracao'] ?></td>
            <td><?php echo $linha['nota_imdb'] ?></td>
            <td><?php echo $linha['nome'] ?></td>
            <td>
                <a href="filmeEditar.php?id=<?= $linha['id'] ?>">Atualizar</a>
                <a href="filmeExcluir.php?id=<?= $linha['id'] ?>">Excluir</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    <br>
    <a href="filmeInserir.php">Novo Filme</a>
    <a href="index.html">Voltar</a>
</body>
</html>
