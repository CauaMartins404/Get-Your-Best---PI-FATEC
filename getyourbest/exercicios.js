const grupos = {
  triceps: [
    { nome: "Flexão de Braços", video: "https://www.youtube.com/embed/GOj4TMPVuZg" },
    { nome: "Tríceps na Barra", video: "https://www.youtube.com/embed/k4Rl9WksA5o" },
    { nome: "Mergulho", video: "https://www.youtube.com/embed/jH9RXQjbXqs" },
    { nome: "Tríceps Pulley", video: "https://www.youtube.com/embed/5qJnirlDtwk" },
    { nome: "Kickback", video: "https://www.youtube.com/embed/MB8LoopNjPE" }
  ],
  biceps: [
    { nome: "Rosca Direta", video: "https://www.youtube.com/embed/nUSmTWGzOqA" },
    { nome: "Rosca Alternada", video: "https://www.youtube.com/embed/kIK3WNjh6zE" },
    { nome: "Rosca Martelo", video: "https://www.youtube.com/embed/RUZ7Med2Mg4" },
    { nome: "Rosca Scott", video: "https://www.youtube.com/embed/zpTK6eihdSA" },
    { nome: "Rosca Invertida", video: "https://www.youtube.com/embed/m2GgKNjYxWU" }
  ],
  costas: [
    { nome: "Puxada na Barra", video: "https://www.youtube.com/embed/e0_JPPnPNXo" },
    { nome: "Remada Curvada", video: "https://www.youtube.com/embed/jhFoLNInyvs" },
    { nome: "Pulldown", video: "https://www.youtube.com/embed/FepRH_MBX8E" },
    { nome: "Remada Unilateral", video: "https://www.youtube.com/embed/SUvZiVClLKw" },
    { nome: "Barra Fixa", video: "https://www.youtube.com/embed/JqeQvFQxIig" }
  ],
  abdomen: [
    { nome: "Abdominal Reto", video: "https://www.youtube.com/embed/tFKEaPlD9BI" },
    { nome: "Abdominal Oblíquo", video: "https://www.youtube.com/embed/VVoRxyCovsI" },
    { nome: "Prancha", video: "https://www.youtube.com/embed/thZZtS9gapk" },
    { nome: "Leg Raise", video: "https://www.youtube.com/embed/JB2oyawG9KI" },
    { nome: "Bicicleta", video: "https://www.youtube.com/embed/oB6Hn_PaM9U" }
  ],
  posterior: [
    { nome: "Stiff", video: "https://www.youtube.com/embed/Bo3-aXGjsNY" },
    { nome: "Cadeira Flexora", video: "https://www.youtube.com/embed/e0_xHkXw350" },
    { nome: "Good Morning", video: "https://www.youtube.com/embed/q4GZN3scJxE" },
    { nome: "Peso Morto", video: "https://www.youtube.com/embed/8DeMCbKrp00" },
    { nome: "Afundo", video: "https://www.youtube.com/embed/SSQkCXcEDx0" }
  ],
  gluteo: [
    { nome: "Agachamento", video: "https://www.youtube.com/embed/Ufh39C5cMfU" },
    { nome: "Cadeira Abdutora", video: "https://www.youtube.com/embed/ffNjbi2rvTQ" },
    { nome: "Glute Bridge", video: "https://www.youtube.com/embed/wPM8icPu6H8" },
    { nome: "Levantamento Terra", video: "https://www.youtube.com/embed/50AkPBZwACQ" },
    { nome: "Passada", video: "https://www.youtube.com/embed/qMu2t29trcY" }
  ],
  quadriceps: [
    { nome: "Agachamento Livre", video: "https://www.youtube.com/embed/Ufh39C5cMfU" },
    { nome: "Leg Press", video: "https://www.youtube.com/watch?v=5sQ0HrXwrjU" },
    { nome: "Cadeira Extensora", video: "https://www.youtube.com/embed/y6juG3XuRe4" },
    { nome: "Afundo", video: "https://www.youtube.com/embed/SSQkCXcEDx0" },
    { nome: "Pistol Squat", video: "https://www.youtube.com/embed/y1eqkNCkhYQ" }
  ]
};
  
  
  function abrirSubgrupo(grupo) {
    const subgrupoElement = document.getElementById(`subgrupo-${grupo}`);
    
 
    if (subgrupoElement.style.display === "block") {
      subgrupoElement.style.display = "none";
      return;
    }
  
  
    subgrupoElement.innerHTML = ''; 
    subgrupoElement.style.display = "block";
  
    grupos[grupo].forEach((exercicio) => {
      const exercicioDiv = document.createElement('div');
      exercicioDiv.classList.add('exercicio');
      exercicioDiv.textContent = exercicio.nome;
      exercicioDiv.onclick = () => mostrarVideo(exercicio.video);
      subgrupoElement.appendChild(exercicioDiv);
    });
  }
  
  
  function mostrarVideo(videoUrl) {
    const videoElement = document.getElementById("video");
    const videoContainer = document.getElementById("video-container");
    
    videoElement.src = videoUrl;
    videoContainer.style.display = "block";
  }
  