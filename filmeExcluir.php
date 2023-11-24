<?php

require_once 'Class/Filme.php';
$id = $_GET['id'];
$filme = new Filme($id);
$filme->excluir();

header('Location: filmeListar.php');
?>