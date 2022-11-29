<?php
    Class Consulta {
        private $DB = 'mysql:host=127.0.0.1;dbname=GFP';
        private $usuarioDB = 'root';
        private $senhaDB = '';
        private $pdo;

        public function __construct(){
            try {
                $this->pdo = new PDO($this->DB, $this->usuarioDB, $this->senhaDB);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo 'DB Erro: '.$e->getMessage();
            }
        }

        public function cadastrarUsuario($nome, $funcao, $condicao, $email, $telefone) {
            try {
                $insert = $this->pdo->query("INSERT INTO usuarios (nome, funcao, condicao, email, telefone) 
                    VALUES('$nome', '$funcao', '$condicao', '$email', '$telefone')");
            } catch(PDOException $e) {
                echo 'DB Erro: '.$e->getMessage();
            }
            return $insert;
        }

        public function atualizarUsuario($id, $nome, $funcao, $condicao, $email, $telefone) {
            try {
                $update = $this->pdo->query("UPDATE usuarios SET 
                        nome = '$nome', funcao = '$funcao', condicao = '$condicao', 
                        email = '$email', telefone = '$telefone'
                    WHERE id = '$id'");
            } catch(PDOException $e) {
                echo 'DB Erro: '.$e->getMessage();
            }
            return $update;
        } 

        public function buscarUsuario($id) {
            try {
                $select = $this->pdo->query("SELECT * FROM usuarios WHERE id = '$id'");
                $usuario = $select->fetch(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                echo 'DB Erro: '.$e->getMessage();
            }
            return $usuario;
        }

        public function listarUsuariosFuncao($funcao) {
            try {
                $select = $this->pdo->query("SELECT * FROM usuarios WHERE funcao = '$funcao'");
                $usuarios = $select->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                echo 'DB Erro: '.$e->getMessage();
            }
            return $usuarios;
        }

        public function listarNomesUsuariosFuncao($funcao) {
            try {
                $select = $this->pdo->query("SELECT nome FROM usuarios WHERE funcao = '$funcao'");
                $nomes = $select->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                echo 'DB Erro: '.$e->getMessage();
            }
            return $nomes;
        }

        public function deletarUsuario($id) {
            try {
                $delete = $this->pdo->query("DELETE FROM usuarios WHERE id = '$id'");
            } catch(PDOException $e) {
                echo 'DB Erro: '.$e->getMessage();
            }
            return $delete;
        }
    }
?>
