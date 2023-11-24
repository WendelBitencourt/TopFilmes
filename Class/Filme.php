<?php
    class Filme{
        public $id;
        public $titulo;
        public $sinopse;
        public $anoLancamento;
        public $duracao;
        public $notaImdb;
        public $foto;
        public $diretor_id;
        public $imgCartaz;

        public $caminhoFoto;
        public $nomeFoto;

        public function __construct($id = false)
        {
            if ($id){
                $this->id=$id;
                $this->carregar();
            }
        }

        function atualizar(){

            if (!empty($_FILES['imgFoto']['name'])) {
                preg_match("/\.([a-zA-Z]{3,4})$/", $_FILES['imgFoto']['name'], $ext);
            
                if (isset($ext[1])) {
                    $nomeFoto = md5(uniqid(time()) . "." . $ext[1]);
                    $caminhoFoto = 'img/' . $nomeFoto;
                    move_uploaded_file($_FILES['imgFoto']['tmp_name'], $caminhoFoto);
                   
                    $this->nomeFoto = $nomeFoto;
                } else {
                    
                    echo "Erro: Extensão de arquivo não reconhecida.";
                    return;  // Ou tome alguma ação apropriada para o seu caso
                }
            }


            $sql = "UPDATE filme SET
            titulo = '$this->titulo',
            sinopse = '$this->sinopse',
            ano_lancamento = '$this->anoLancamento',
            duracao = '$this->duracao',
            nota_imdb = '$this->notaImdb',
            img_cartaz = '$this->nomeFoto', 
            fk_diretor_id = '$this->diretor_id'
            WHERE id = $this->id";

            include "Class/Conexao.php";
            $conexao->exec($sql);
        }

        function carregar(){
            //query SQL para buscar o aluno no banco de dados pelo id
            $sql = "SELECT * FROM filme WHERE id =" . $this->id;
            include "Class/Conexao.php";

            // Execução da query a armazenamento do resultado em uma variável
            $resultado = $conexao->query($sql);
            // Recuperação da primeira linha do resultado como um array associativo
            $linha = $resultado->fetch();

            // Atribuição dos valores dos campos da turma recuperados do banco às propriedades do objeto
            $this->id = $linha['id'];
            $this->titulo = $linha['titulo'];
            $this->sinopse = $linha['sinopse'];
            $this->anoLancamento = $linha['ano_lancamento'];
            $this->duracao = $linha['duracao'];
            $this->notaImdb = $linha['nota_imdb'];
            $this->foto = $linha['img_cartaz'];
            $this->diretor_id = $linha['fk_diretor_id'];
        }

        public function listar(){
            $sql = "SELECT f.id, f.titulo, f.sinopse, f.ano_lancamento, f.duracao, f.nota_imdb, f.img_cartaz, f.fk_diretor_id, d.nome
                    FROM filme f JOIN diretor d
                    ON f.fk_diretor_id = d.id
                    ORDER BY f.id ";
            include "Class/Conexao.php";
            $resultado = $conexao->query($sql);
            $lista = $resultado->fetchAll();
            return $lista;
        }

        function inserir() {
            //A função do PHP "preg_match()", pega a extensão da imagem e carrega a variável $ext
            preg_match("/\.([a-zA-Z]{3,4})$/", $this->foto["name"], $ext);
        
            /*Esta linha usa as funções PHP md5(), uniqid() e time()
            para gerar um nome único para a imagem. Depois concatna com a extensão extraída na linha acima*/
            if (isset($ext[1])) {
                $this->nomeFoto = md5(uniqid(time()) . "." . $ext[1]);
            } else {
                // Trate a situação em que a extensão não foi encontrada
                echo "Erro: Extensão de arquivo não reconhecida.";
                return;  // Ou tome alguma ação apropriada para o seu caso
            }
        
            //Esta linha concatena o caminho da pasta que guardaremos as imagens com nome da imagem
            $this->caminhoFoto = 'img/' . $this->nomeFoto;
        
            //aqui utilizamos a função PHP move_upload_file() para salvar a imagem na pasta
            move_uploaded_file($this->foto["tmp_name"], $this->caminhoFoto);
        
            $sql = "INSERT INTO filme (titulo, sinopse, ano_lancamento, duracao, nota_imdb, img_cartaz, fk_diretor_id) VALUES (
                '{$this->titulo}',    
                '{$this->sinopse}',
                '{$this->anoLancamento}',
                '{$this->duracao}',
                '{$this->notaImdb}',
                '{$this->nomeFoto}',
                '{$this->diretor_id}'
            )";
            include "Class/Conexao.php";
            $conexao->exec($sql);
            echo "Registro gravado com sucesso!";
            header("refresh:5; URL= filmeListar.php");
        }

        function excluir() {
            $sql = "DELETE FROM filme WHERE id=".$this->id;
    
            include "Class/Conexao.php";
    
            $conexao->exec($sql);
            }      
        }


?>