<?php
    require_once "Class/Usuario.php";
    $diretor = new Usuario();
    $lista = $diretor->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Acadêmico</title>
    <link rel="stylesheet" href="css/listar.css">
</head>
<body>
    <h1>Sistema Filmes</h1>
    <h3>Listar Diretores</h3>
    
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Mini-Biografia</th>
            <th>Ano de Nascimento</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($lista as $linha): ?>
        <tr>
            <td><?php echo $linha['id'] ?></td>
            <td><?php echo $linha['nome'] ?></td>
            <td><?php echo substr($linha['minibio'], 0, 100) . (strlen($linha['minibio']) > 100 ? '...' : ''); ?></td>
            <td><?php echo $linha['ano_nascimento'] ?></td>
            <td>
                <a href="diretoresEditar.php?id=<?= $linha['id'] ?>">Atualizar</a>
                <a href="diretorExcluir.php?id=<?= $linha['id'] ?>">Excluir</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    <br>
    <a href="diretorInserir.php">Novo diretor</a>
    <a href="index.html">Voltar</a>
</body>
</html>
