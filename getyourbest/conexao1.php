<?php
$host = 'localhost';
$db   = 'getyourbest';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>

<?php
class Usuario {
    private $nome;
    private $email;
    private $senhaHash;

    public function __construct($nome, $email, $senha) {
        $this->nome = htmlspecialchars($nome);
        $this->email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $this->senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenhaHash() {
        return $this->senhaHash;
    }
}
?>