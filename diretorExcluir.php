<?php

// Inclui o arquivo que contém a definição da classe Turma
require_once 'Class/Usuario.php';

// Obtém o valor do parâmetro "id" da URL e armazena em variável
$id = $_GET['id'];

// Cria um novo objeto Turma
$diretor = new Usuario($id);

// Chama o método "excluir" do objeto Turma
$diretor->excluir();

// Redireciona o usuário para a página "turmas-listar.php"
header('Location: diretoresListar.php');
?>