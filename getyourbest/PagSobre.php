<?php 
// PagSobre.php

// Define o título e o CSS específico para esta página
$titulo = "Sobre Nós";
$css_especifico = "css/PagSobre.css"; // Você terá um CSS só para o fundo desta página

// Inclui o cabeçalho
require_once 'templates/header.php';
?>

<!-- O HTML de antes foi substituído pelo "require_once" acima -->

<div class="page-header">
    <h1>Get Your Best - Sobre</h1>
</div>

<main class="container">
    <div class="sobre-content">
        <h2>Quem Somos</h2>
        <p>
            O <strong>Get Your BEST</strong> é um projeto acadêmico voltado à gestão de treinos e promoção do bem-estar físico e mental. 
            Criado por estudantes apaixonados por saúde e tecnologia, nosso objetivo é oferecer informações personalizadas sobre treinos, biotipo, IMC, peso ideal e muito mais.
        </p>
        <h3>Nosso Propósito</h3>
        <p>
            Promover a qualidade de vida através de conhecimento, acessibilidade e uma comunidade engajada. Acreditamos que todos podem alcançar sua melhor versão — seu "BEST".
        </p>
        <h3>Funcionalidades do Projeto</h3>
        <ul>
            <li>📊 Cálculo de IMC e peso ideal</li>
            <li>🏋️ Treinos personalizados por perfil</li>
            <li>🧠 Conteúdos com especialistas em saúde física e mental</li>
            <li>💬 Comunidades de apoio via WhatsApp</li>
        </ul>
    </div>
</main>

<!-- Se você tiver um rodapé comum, pode criar um "templates/footer.php" e incluí-lo aqui -->
<!-- <?php require_once 'templates/footer.php'; ?> -->

</body>
</html>