<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(["erro" => "Acesso não autorizado"]);
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

require_once 'conexao1.php';

$stmtTreino = $conn->prepare("SELECT dados FROM treinos WHERE usuario_id = ?");
$stmtTreino->bind_param("i", $usuario_id);
$stmtTreino->execute();
$resTreino = $stmtTreino->get_result();

if ($resTreino->num_rows > 0) {
    $row = $resTreino->fetch_assoc();
    echo $row['dados'];
    exit;
}

$stmtUser = $conn->prepare("SELECT disponibilidade FROM usuarios WHERE id = ?");
$stmtUser->bind_param("i", $usuario_id);
$stmtUser->execute();
$resUser = $stmtUser->get_result();
$user = $resUser->fetch_assoc();

if (!$user) {
    echo json_encode(["erro" => "Usuário não encontrado"]);
    exit;
}

$disponibilidade = $user['disponibilidade'] ?? '3x';

switch ($disponibilidade) {
    case '3x': $dias = 3; $minExPorDia = 6; break;
    case '4x': $dias = 4; $minExPorDia = 4; break;
    case '5x': $dias = 5; $minExPorDia = 3; break;
    default:   $dias = 3; $minExPorDia = 6;
}


$exerciciosPorGrupo = [
    "triceps" => ["Flexão de Braços", "Tríceps na Barra", "Mergulho", "Tríceps Pulley", "Kickback"],
    "biceps" => ["Rosca Direta", "Rosca Alternada", "Rosca Martelo", "Rosca Scott", "Rosca Invertida"],
    "costas" => ["Puxada na Barra", "Remada Curvada", "Pulldown", "Remada Unilateral", "Barra Fixa"],
    "abdomen" => ["Abdominal Reto", "Abdominal Oblíquo", "Prancha", "Leg Raise", "Bicicleta"],
    "posterior" => ["Stiff", "Cadeira Flexora", "Good Morning", "Peso Morto", "Afundo"],
    "gluteo" => ["Agachamento", "Cadeira Abdutora", "Glute Bridge", "Levantamento Terra", "Passada"],
    "quadriceps" => ["Agachamento Livre", "Leg Press", "Cadeira Extensora", "Afundo", "Pistol Squat"]
];

$grupos = array_keys($exerciciosPorGrupo);
shuffle($grupos);

$gruposPorDia = array_fill(0, $dias, []);
foreach ($grupos as $i => $grupo) {
    $gruposPorDia[$i % $dias][] = $grupo;
}

$treino = [];
foreach ($gruposPorDia as $i => $gruposDia) {
    $exercicios = [];
    foreach ($gruposDia as $grupo) {
        $exs = $exerciciosPorGrupo[$grupo];
        shuffle($exs);
        $exercicios[] = $exs[0];
        if (count($exercicios) < $minExPorDia) $exercicios[] = $exs[1];
    }
    while (count($exercicios) < $minExPorDia) {
        foreach ($gruposDia as $grupo) {
            $extras = $exerciciosPorGrupo[$grupo];
            shuffle($extras);
            foreach ($extras as $ex) {
                if (!in_array($ex, $exercicios)) {
                    $exercicios[] = $ex;
                    break;
                }
            }
            if (count($exercicios) >= $minExPorDia) break;
        }
    }
    $treino[] = [
        "dia" => "Dia " . ($i + 1),
        "exercicios" => $exercicios
    ];
}

$jsonTreino = json_encode($treino, JSON_UNESCAPED_UNICODE);

$stmtInsert = $conn->prepare("INSERT INTO treinos (usuario_id, dados) VALUES (?, ?)");
$stmtInsert->bind_param("is", $usuario_id, $jsonTreino);
$stmtInsert->execute();

echo $jsonTreino;
