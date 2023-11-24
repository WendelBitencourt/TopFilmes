<?php
require_once "Class/Filme.php";

$id = $_POST['id'];

// Cria um objeto Filme com base no ID
$filme = new Filme($id);

// Atualiza os dados do filme

$filme->titulo = $_POST['txtTitulo'];
$filme->sinopse = $_POST['txtSinopse'];
$filme->anoLancamento = $_POST['numAnoLancamento'];
$filme->duracao = $_POST['txtDuracao'];
$filme->notaImdb = $_POST['txtNotaImdb'];
$filme->diretor_id = $_POST['selDiretor'];

// if (!empty($_FILES['imgFoto']['name'])) {
//     preg_match("/\.([a-zA-Z]{3,4})$/", $_FILES['imgFoto']['name'], $ext);

//     if (isset($ext[1])) {
//         $nomeFoto = md5(uniqid(time()) . "." . $ext[1]);
//         $caminhoFoto = 'img/' . $nomeFoto;
//         move_uploaded_file($_FILES['imgFoto']['tmp_name'], $caminhoFoto);
       
//         $filme->nomeFoto = $nomeFoto;
//     } else {
        
//         echo "Erro: Extensão de arquivo não reconhecida.";
//         return;  // Ou tome alguma ação apropriada para o seu caso
//     }
// }

// Chama o método atualizar na classe Filme
$filme->atualizar();


// Redireciona para a página de listagem de filmes
header('Location: filmeListar.php');
exit();
?>
