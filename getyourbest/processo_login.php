<?php
// processo_login.php
session_start();
require_once 'conexao.php'; // Usa o arquivo de conexão padronizado

// 1. Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['email'], $_POST['senha'])) {
    header("Location: login.php");
    exit;
}

// 2. Limpa e valida o e-mail
$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$senha = $_POST['senha'];

if (!$email) {
    $_SESSION['erro_login'] = "O formato do e-mail é inválido.";
    header("Location: login.php");
    exit;
}

// 3. Consulta o banco de dados
try {
    $stmt = $conn->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();

        // 4. Verifica a senha
        if (password_verify($senha, $usuario['senha'])) {
            // SUCESSO: Senha correta!
            session_regenerate_id(true); // Previne ataque de "session fixation"
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            header("Location: index.php"); // Redireciona para a página principal
            exit;
        }
    }
    
    // FALHA: E-mail não encontrado ou senha incorreta
    $_SESSION['erro_login'] = "E-mail ou senha incorretos.";
    header("Location: login.php"); // Redireciona de volta para a página de login
    exit;

} catch (mysqli_sql_exception $e) {
    // Erro no servidor (ex: banco de dados offline)
    error_log("Erro de banco de dados no login: " . $e->getMessage()); // Log para o desenvolvedor
    $_SESSION['erro_login'] = "Ocorreu um erro inesperado. Tente novamente mais tarde.";
    header("Location: login.php");
    exit;
}
?>