<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grupos Musculares</title>
  <link rel="stylesheet" href="exercicios.css">
</head>
<body>
    <header class="navbar">
        <div class="navbar-container">
            <div class="logo">
                <img src="imagens/Icone.png" alt="GetYourBest Logo" />
            </div>
            <nav class="menu">
              <a href="index.php">Home</a>
                <a href="PagSobre.html">Sobre</a>
                <a href="PagExercicios.html" class="ativo">Exercícios</a>
                <a href="PagBlog.html">Blog</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <section class="grupos-musculares">
            <h1>Grupos Musculares</h1>
            <div class="particoes">
                <div class="particao" onclick="abrirSubgrupo('triceps')">Tríceps</div>
                <div id="subgrupo-triceps" class="subgrupo">
                    <div class="exercicio">Exercício 1: Tríceps Teste</div>
                    <div class="exercicio">Exercício 2: Tríceps Extensão</div>
                </div>

                <div class="particao" onclick="abrirSubgrupo('biceps')">Bíceps</div>
                <div id="subgrupo-biceps" class="subgrupo">
                    <div class="exercicio">Exercício 1: Bíceps Curl</div>
                    <div class="exercicio">Exercício 2: Bíceps Inclinado</div>
                </div>

                <div class="particao" onclick="abrirSubgrupo('costas')">Costas</div>
                <div id="subgrupo-costas" class="subgrupo">
                    <div class="exercicio">Exercício 1: Remada Baixa</div>
                    <div class="exercicio">Exercício 2: Puxada Frente</div>
                </div>

                <div class="particao" onclick="abrirSubgrupo('abdomen')">Abdômen</div>
                <div id="subgrupo-abdomen" class="subgrupo">
                    <div class="exercicio">Exercício 1: Abdominal Crunch</div>
                    <div class="exercicio">Exercício 2: Prancha</div>
                </div>

                <div class="particao" onclick="abrirSubgrupo('posterior')">Posterior</div>
                <div id="subgrupo-posterior" class="subgrupo">
                    <div class="exercicio">Exercício 1: Levantamento Terra</div>
                    <div class="exercicio">Exercício 2: Stiff</div>
                </div>

                <div class="particao" onclick="abrirSubgrupo('gluteo')">Glúteo</div>
                <div id="subgrupo-gluteo" class="subgrupo">
                    <div class="exercicio">Exercício 1: Agachamento</div>
                    <div class="exercicio">Exercício 2: Hip Thrust</div>
                </div>

                <div class="particao" onclick="abrirSubgrupo('quadriceps')">Quadríceps</div>
                <div id="subgrupo-quadriceps" class="subgrupo">
                    <div class="exercicio">Exercício 1: Agachamento Livre</div>
                    <div class="exercicio">Exercício 2: Leg Press</div>
                </div>
            </div>
        </section>

        <section id="video-section" class="video-section">
            <h2>Vídeo do Exercício</h2>
            <div id="video-container" class="video-container">
                <iframe id="video" width="300" height="200" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </section>
    </main>

    <script src="exercicios.js"></script>
</body>
</html>
