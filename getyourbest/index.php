<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;900&display=swap" rel="stylesheet" />
  <title>Home | GetYourBest</title>
  <link rel="shortcut icon" href="Imagens/Icone.png" type="image/x-icon"/>
</head>
<body>
  <header class="navbar">
    <div class="navbar-container">
      <div class="logo">
        <img src="imagens/Icone.png" alt="GetYourBest Logo" />
      </div>
  <nav class="menu">
  <a href="#inicio" class="ativo">Home</a>
  <a href="PagSobre.html">Sobre</a>
  <a href="PagExercicios.html">Exercícios</a>
  <a href="PagBlog.html">Blog</a>
<?php if (isset($_SESSION['usuario_nome'])): ?>
    <a href="treino.php">Treino Personalizado</a>
    <a href="logout.php">Sair</a>
<?php endif; ?>
      </nav>
    </div>
  </header>

  <div class="tudo">
    <main class="principal">

      <section class="secao fundo fundo1">
        <h1>Get Your Best</h1>
      </section>

      <section class="secao caixa">
        <div class="conteudo">
          <div class="quadro">
            <h2>Transforme seu corpo e conquiste sua saúde</h2>

            <p>Seja você iniciante ou avançado, nosso sistema inteligente se adapta ao seu nível,
                oferecendo sempre os melhores desafios e resultados.</p>

            <div class="botoes">
              <a href="Cadastro.html" class="btn">Cadastrar</a>
              <a href="Login.html" class="btn">Entrar</a>
              <a href="#" class="btn btn-outline">Acessar como visitante</a>
            </div>
          </div>
        </div>
      </section>

      <section class="secao fundo fundo2">
        <h1>Supere seus limites</h1>
      </section>

      <section class="secao caixa">
        <div class="conteudo">
          <h2>Algoritmo que entende você</h2>
          <p>Nosso sistema avalia seu IMC, histórico de treinos e tipo físico para criar rotinas personalizadas, seguras e eficazes.</p>
          <p>Com isso, você evita lesões, treina com propósito e acompanha sua evolução de forma clara.</p>
        </div>
      </section>

      <section class="secao fundo fundo3">
        <h1>Treinos Inteligentes</h1>
      </section>

      <section class="secao caixa">
        <div class="conteudo">
          <h2>Dicas, curiosidades e guias</h2>
          <p>Acesse nosso blog com conteúdos atualizados sobre treino, alimentação, suplementação, saúde mental e muito mais.</p>
          <p>Aprenda com profissionais e aplique no seu dia a dia.</p>
        </div>
      </section>

    </main>
  </div>

</body>
</html>
