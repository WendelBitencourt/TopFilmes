<?php
    require_once "Class/Filme.php";
    $filme = new Filme();

    $filme->titulo = $_POST['txtTitulo'];
    $filme->sinopse = $_POST['txtSinopse'];
    $filme->anoLancamento = $_POST['anoLancamento'];
    $filme->duracao = $_POST['duracao'];
    $filme->notaImdb = $_POST['nota_imdb'];
    $filme->foto = $_FILES['imgfoto'];
    $filme->diretor_id = $_POST['seldiretor'];

    $filme->inserir();
?>
