document.addEventListener("DOMContentLoaded", async () => {
  const treinoDiv = document.getElementById("treino");

  try {
    const res = await fetch("gerar_treino.php");
    const dados = await res.json();

    if (dados.erro) {
      treinoDiv.innerHTML = `<p>${dados.erro}</p>`;
      return;
    }

    dados.forEach((dia) => {
      const divDia = document.createElement("div");
      divDia.className = "exercicio";
      divDia.innerHTML = `
        <h2>${dia.dia}</h2>
        <ul>
          ${dia.exercicios.map(ex => `<li>${ex}</li>`).join("")}
        </ul>
      `;
      treinoDiv.appendChild(divDia);
    });
  } catch (err) {
    treinoDiv.innerHTML = "<p>Erro ao carregar o treino.</p>";
    console.error(err);
  }
});
