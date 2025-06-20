<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: LoginErro.html");
    exit();
}

require_once 'conexao1.php';

$usuario_id = $_SESSION['usuario_id'];
$stmt = $conn->prepare("SELECT nome, peso FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$res = $stmt->get_result();
$usuario = $res->fetch_assoc();

$nome = $usuario['nome'];
$peso_inicial = $usuario['peso'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Seu Treino</title>
  <link rel="stylesheet" href="treinopersona.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head> <div class="logo">
        <img src="imagens/Icone.png" alt="GetYourBest Logo" />
      </div>
<body>
  <div class="formulario-container">
    <h1>Bem-vindo, <?php echo htmlspecialchars($nome); ?>!</h1>

    <div class="peso-section">
      <p><strong>Peso Inicial:</strong> <?php echo number_format($peso_inicial, 2, ',', '.'); ?> kg</p>
      <p>
        <strong>Peso Atual:</strong>
        <input type="number" id="pesoAtual" max="300" step="0.01" disabled placeholder="Digite o peso">
        <button id="editarPeso">Alterar</button>
      </p>
    </div>

  <button id="toggleTreino">Ver Treino</button>

  <div id="sidebarTreino" class="sidebar">
    <h2>Seu Treino</h2>
    <div id="treino">
  
    </div>
  </div>

  <script>
    document.getElementById("toggleTreino").addEventListener("click", () => {
      document.getElementById("sidebarTreino").classList.toggle("open");
    });

    const inputPeso = document.getElementById("pesoAtual");
    const btnEditar = document.getElementById("editarPeso");

    btnEditar.addEventListener("click", () => {
      if (inputPeso.disabled) {
        inputPeso.disabled = false;
        inputPeso.focus();
        btnEditar.textContent = "Salvar";
      } else {
        if (!inputPeso.value) {
          alert("Digite um peso válido.");
          return;
        }
        inputPeso.disabled = true;
        btnEditar.textContent = "Alterar";
      }
    });
  </script>
  <script src="treinopersona.js"></script>
</body>
</html>
