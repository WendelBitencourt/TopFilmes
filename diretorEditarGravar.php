<?php


// Inclui o arquivo que contém a definição da classe Turma
require_once 'Class/Usuario.phpp';

// Cria um novo objeto Turma utilizando o id do objeto como referência
$id = isset($_POST['id']) ? $_POST['id'] : null;
$diretor = new Usuario($id);

// Verifica a existência dos índices antes de usá-los
$diretor->nome = isset($_POST['txtNome']) ? $_POST['txtNome'] : "";
$diretor->minibio = isset($_POST['txtMinibio']) ? $_POST['txtMinibio'] : "";
$diretor->anoNascimento = isset($_POST['numAnoNasc']) ? $_POST['numAnoNasc'] : "";

// Chama o método atualizar() no objeto Turma
$diretor->atualizar();


// Redireciona a página para a listagem de turmas
header("refresh:5; URL= diretoresListar.php");
?>