<?php
// /src/Usuario.php

class Usuario {
    private $nome;
    private $email;
    private $senhaHash;

    /**
     * Constrói um novo objeto Usuario.
     * Limpa, valida e prepara os dados do usuário.
     */
    public function __construct($nome, $email, $senha) {
        $this->nome = htmlspecialchars(trim($nome));
        $this->email = filter_var(trim($email), FILTER_VALIDATE_EMAIL);
        $this->senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenhaHash() {
        return $this->senhaHash;
    }
    
    /**
     * Valida se os dados essenciais do usuário são válidos.
     * @return bool
     */
    public function isValido() {
        return !empty($this->nome) && $this->email !== false;
    }
}
?>