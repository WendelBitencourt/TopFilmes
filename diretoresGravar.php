<?php
    require_once 'Class/Usuario.php';

    $diretor = new Usuario();

    $diretor->nome = isset($_POST['txtNome']) ? $_POST['txtNome'] : "";
    $diretor->minibio = isset($_POST['txtMinibio']) ? $_POST['txtMinibio'] : "";
    $diretor->anoNascimento = isset($_POST['numAnoNasc']) ? $_POST['numAnoNasc'] : "";


    if ($diretor->inserir()){
        echo "Cadastrado com Sucesso";
    }else{
        echo "Falha ao cadastrar";
    }      
    header("refresh:5; URL= diretoresListar.php");


    
?>