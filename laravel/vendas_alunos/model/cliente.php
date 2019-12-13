<?php
    class Cliente {
        private $idCliente;
        private $nome;
        private $endereco;
        private $telefone;
        private $email;

        public function __construct($idCliente, $nome, $endereco, 
                                    $telefone, $email) {
            $this->idCliente = $idCliente;
            $this->nome = $nome;
            $this->endereco = $endereco;
            $this->telefone = $telefone;
            $this->email = $email;
        }

        public function setIdCliente($idCliente) {
            $this->idCliente = $idCliente;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setEndereco($endereco) {
            $this->endereco = $endereco;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getIdCliente() {
            return $this->idCliente;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getEndereco() {
            return $this->endereco;
        }
 
        public function getTelefone() {
            return $this->telefone;
        }

        public function getEmail() {
            return $this->email;
        }


    };
?>
