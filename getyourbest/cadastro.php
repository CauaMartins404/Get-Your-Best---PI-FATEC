<?php
require_once 'conexao1.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = htmlspecialchars($_POST['nome']);
    $celular = htmlspecialchars($_POST['celular']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha'];
    $treinou = $_POST['treinou'];
    $peso = (int) $_POST['peso'];
    $altura = (int) $_POST['altura'];
    $idade = (int) $_POST['idade'];
    $disponibilidade = $_POST['disponibilidade'];
    $biotipo = $_POST['biotipo'];
    $objetivo = $_POST['objetivo'];

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO usuarios (nome, celular, email, senha, treinou, peso, altura, idade, disponibilidade, biotipo, objetivo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssiissss", $nome, $celular, $email, $senha_hash, $treinou, $peso, $altura, $idade, $disponibilidade, $biotipo, $objetivo);

    if ($stmt->execute()) {
 
    header("Location: login.html"); 
    exit; 
} else {
    echo "Erro: " . $stmt->error;
}
}
?>
