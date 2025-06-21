<?php
// Define as credenciais de conexão
$host = 'localhost';
$db   = 'getyourbest';
$user = 'root';
$pass = '';

// Ativa o modo de exceções para erros do MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Cria a conexão
    $conn = new mysqli($host, $user, $pass, $db);
    // Define o charset para evitar problemas com acentos
    $conn->set_charset('utf8mb4');
} catch (mysqli_sql_exception $e) {
    // Em um ambiente de produção, logue o erro em vez de exibi-lo
    error_log('Erro de Conexão com o Banco de Dados: ' . $e->getMessage());
    // Exibe uma mensagem genérica para o usuário
    die("Ocorreu um erro ao conectar ao servidor. Por favor, tente novamente mais tarde.");
}
?>