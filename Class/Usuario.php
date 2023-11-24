<?php
    class Usuario{
        public $id;
        public $nome;
        public $minibio;
        public $anoNascimento;

        public function __construct($id = false)
        {
            if ($id){
                $this->id=$id;
                $this->carregar();
            }
        }

        function carregar() {
            
            $sql = "SELECT * FROM diretor WHERE id=" . $this->id;
            include "Class/Conexao.php";

            
            $resultado = $conexao->query($sql);
            
            $linha = $resultado->fetch();

            $this->nome = $linha['nome'];
            $this->minibio = $linha['minibio'];
            $this->anoNascimento = $linha['ano_nascimento'];
        }

        function listar() {
            $sql = "SELECT * FROM diretor";
            include "Class/Conexao.php";
            $resultado = $conexao->query($sql);
            $lista = $resultado->fetchAll();
            
            return $lista;
        }

        function inserir(){
            $sql = "INSERT INTO diretor (nome, minibio, ano_nascimento) VALUES (?, ?, ?)";

            include 'Class/Conexao.php';
        
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(1, $this->nome);
            $stmt->bindParam(2, $this->minibio);
            $stmt->bindParam(3, $this->anoNascimento);
        
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        function excluir() {
        $sql = "DELETE FROM diretor WHERE id=".$this->id;

        include "Class/Conexao.php";

        $conexao->exec($sql);
        }

        public function atualizar()
        {
            $sql = "UPDATE diretor SET
                        nome = :nome,
                        minibio = :minibio,
                        ano_nascimento = :ano_nascimento
                    WHERE id = :id";

            include "Class/Conexao.php";
            
            $stmt = $conexao->prepare($sql);

            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':minibio', $this->minibio);
            $stmt->bindParam(':ano_nascimento', $this->anoNascimento);
            $stmt->bindParam(':id', $this->id);

            // Executa a query e verifica se há erros
            if ($stmt->execute()) {
                echo "Atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar: " . $stmt->errorInfo()[2];
            }
        }


    }
?>