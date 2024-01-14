<?php
    class Dado{
        protected $pdo;
        public function __construct(){
            try {
                $this->pdo= new PDO("mysql:dbname=gerador_fake;host=localhost;charset=utf8","root","");
                echo '<script>console.log("Banco de dados funcionando")</script>';
            }
            catch (PDOException $e){
                echo '<script>console.log("Conexão com o banco de dados não funcionou")</script>';
            }
            catch (Exception $e){
                echo '<script>console.log("Erro com dado encontrado")</script>';
            }
        }

        public function getQtdDados(){
            $banco = "select count(id) as total from dados where 1";
            $banco=$this->pdo->prepare($banco);
            $banco->execute();
            $resultado=$banco->fetch(PDO::FETCH_ASSOC);
            return $resultado['total'];
        }

        public function getEndereco()
        {
            $banco="SELECT endereco from dados where id=:idG";
            $banco=$this->pdo->prepare($banco);
            $banco->bindValue(":idG",rand(1,$this->getQtdDados()));
            $banco->execute();
            $resultado=$banco->fetch(PDO::FETCH_ASSOC);
            #var_dump($resultado);
            return isset($resultado['endereco']) ? (string) $resultado['endereco'] : 'Nada encontrado :(';
        }

        public function getNome()
        {
            $banco="SELECT nome from dados where id=:idG";
            $banco=$this->pdo->prepare($banco);
            $banco->bindValue(":idG",rand(1,$this->getQtdDados()));
            $banco->execute();
            $resultado=$banco->fetch(PDO::FETCH_ASSOC);
            return $resultado['nome'];
        }

        public function getTelefone()
        {
            $banco="SELECT telefone from dados where id=:idG";
            $banco=$this->pdo->prepare($banco);
            $banco->bindValue(":idG",rand(1,$this->getQtdDados()));
            $banco->execute();
            $resultado=$banco->fetch(PDO::FETCH_ASSOC);
            return $resultado['telefone'];
        }

    }
?>