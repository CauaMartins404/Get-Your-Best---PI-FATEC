<?php
// login.php
// Inicia a sessão para poder ler as mensagens de erro enviadas pelo processo_login.php
session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | GetYourBest</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  
  <!-- ATENÇÃO: Verifique o caminho correto para seus arquivos CSS -->
  <link rel="stylesheet" href="css/csslogin.css" /> 
</head>
<body>
  <div class="logo-container">
    <a href="index.php"><img src="imagens/icone.png" alt="Logo da Academia" class="logo" /></a>
  </div>

  <div class="formulario-container">
    <h1>Login</h1>
    
    <?php
      // BLOCO IMPORTANTE: Exibe a mensagem de erro se ela existir
      if (isset($_SESSION['erro_login'])) {
          echo '<p style="color: #ff4d4d; text-align: center; margin-bottom: 15px; font-weight: 600;">' . htmlspecialchars($_SESSION['erro_login']) . '</p>';
          // Limpa a mensagem para não aparecer de novo se o usuário recarregar a página
          unset($_SESSION['erro_login']);
      }
    ?>

    <!-- ATENÇÃO AQUI: O 'action' aponta para o script de processamento -->
    <form action="processo_login.php" method="POST">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required />

      <label for="senha">Senha:</label>
      <div class="campo-senha">
        <input type="password" id="senha" name="senha" required />
        <button type="button" class="mostrar-senha" onclick="alternarSenha()">👁️</button>
      </div>
      <button type="submit">Entrar</button>
    </form>
  </div>
  
  <script>
    function alternarSenha() {
      const input = document.getElementById('senha');
      input.type = (input.type === 'password') ? 'text' : 'password';
    }
  </script>
</body>
</html>