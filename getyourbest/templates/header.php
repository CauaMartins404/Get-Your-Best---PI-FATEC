<?php
// templates/header.php

// Inicia a sessão se ainda não tiver sido iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Lógica para determinar qual página está ativa
// Pega o nome do script atual (ex: 'index.php')
$pagina_atual = basename($_SERVER['SCRIPT_NAME']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;900&display=swap" rel="stylesheet" />
    
    <!-- Link para o CSS GLOBAL -->
    <link rel="stylesheet" href="css/main.css" />

    <!-- Título dinâmico (você define a variável $titulo na página antes de incluir o header) -->
    <title><?php echo isset($titulo) ? htmlspecialchars($titulo) . ' | GetYourBest' : 'GetYourBest'; ?></title>
    
    <!-- Incluir outros links de CSS específicos, se necessário -->
    <?php if (isset($css_especifico)): ?>
        <link rel="stylesheet" href="<?php echo $css_especifico; ?>" />
    <?php endif; ?>
    
    <link rel="shortcut icon" href="imagens/Icone.png" type="image/x-icon"/>
</head>
<body>

<header class="navbar">
    <div class="navbar-container">
        <div class="logo">
            <a href="index.php"><img src="imagens/Icone.png" alt="GetYourBest Logo" /></a>
        </div>
        <nav class="menu">
            <a href="index.php" class="<?php echo ($pagina_atual == 'index.php') ? 'ativo' : ''; ?>">Home</a>
            <a href="PagSobre.php" class="<?php echo ($pagina_atual == 'PagSobre.php') ? 'ativo' : ''; ?>">Sobre</a>
            <a href="PagExercicios.php" class="<?php echo ($pagina_atual == 'PagExercicios.php') ? 'ativo' : ''; ?>">Exercícios</a>
            <a href="PagBlog.php" class="<?php echo in_array($pagina_atual, ['PagBlog.php', 'dieta.php', 'biotipos.php']) ? 'ativo' : ''; ?>">Blog</a>

            <?php // Links que só aparecem se o usuário estiver logado ?>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <a href="treino.php" class="<?php echo ($pagina_atual == 'treino.php') ? 'ativo' : ''; ?>">Meu Treino</a>
                <a href="logout.php">Sair</a>
            <?php endif; ?>
        </nav>
    </div>
</header>