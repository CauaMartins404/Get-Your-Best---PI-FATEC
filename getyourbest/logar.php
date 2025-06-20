<?php
session_start();
require_once 'conexao1.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
           $_SESSION['usuario_id'] = $usuario['id'];
$_SESSION['usuario_nome'] = $usuario['nome'];

            header("Location: index.php");
            exit();
        }
    }

    header("Location: LoginErro.html");
    exit();
}
?>
