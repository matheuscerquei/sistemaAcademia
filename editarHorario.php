<?php
require "configPDO.php";

session_start();

// Verifica se o ID da aula foi passado
if (!isset($_GET['id'])) {
    header('Location: verAgendamento.php'); // Redireciona se não houver ID
    exit();
}

$id_aula = $_GET['id'];

// Consulta para buscar os dados da aula
$sql = $pdo->prepare("SELECT * FROM agenda_aulas WHERE id_aula = :id_aula");
$sql->bindParam(':id_aula', $id_aula);
$sql->execute();
$aula = $sql->fetch(PDO::FETCH_ASSOC);

// Verifica se a aula foi encontrada
if (!$aula) {
    echo "Aula não encontrada.";
    exit();
}

// Atualiza os dados se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_professor = $_POST["id_professor"];
    $turno_inicio = $_POST["turno_inicio"];
    $turno_fim = $_POST["turno_fim"];
    $assunto = $_POST["assunto"];

    // Atualiza a aula no banco de dados
    $stmt = $pdo->prepare("UPDATE agenda_aulas SET id_professor = :id_professor, turno_inicio = :turno_inicio, turno_fim = :turno_fim, assunto = :assunto WHERE id_aula = :id_aula");
    $stmt->bindParam(':id_professor', $id_professor);
    $stmt->bindParam(':turno_inicio', $turno_inicio);
    $stmt->bindParam(':turno_fim', $turno_fim);
    $stmt->bindParam(':assunto', $assunto);
    $stmt->bindParam(':id_aula', $id_aula);
    $stmt->execute();

    header('Location: verAgendamento.php'); // Redireciona após a atualização
    exit();
}

// Consulta para buscar os professores
$sql = $pdo->prepare("SELECT id_professor, nome_professor FROM professor");
$sql->execute();
$professores = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="shortcut icon" type="image/x-jpg" href="biceps.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aula</title>
</head>
<style>
    body {
      background-image: url('https://img.freepik.com/fotos-gratis/homem-jovem-fitness-em-estudio_7502-5016.jpg?t=st=1733952840~exp=1733956440~hmac=693b5ed7a1a84b801a203669830db945ed7e9f1ba3073b1395a1f458fd40a89b&w=1380');
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;

      .list-group-item {
    transition: background-color 0.3s, transform 0.3s;
  }

  .list-group-item:hover {
    background-color: #f8f9fa; /* Cor de fundo ao passar o mouse */
    transform: scale(1.02); /* Efeito de aumento ao passar o mouse */
  }

  .text-primary {
    font-family: 'Arial', sans-serif; /* Fonte do título */
  }
    }
  </style>
<body>
    <form action="editarHorario.php" method="post" class="container w-50 border border-3 rounded p-4 shadow" style="background-color: gray;">
        <h2 class="text-center text-white">Editar Aula</h2>
        
        <div class="form-group">
            <label for="professor">Professor:</label>
            <select class="form-control" id="professor" name="id_professor" required>
                <option value="">Selecione um professor</option>
                <?php foreach ($professores as $professor): ?>
                    <option value="<?= htmlspecialchars($professor['id_professor']); ?>" <?= $aula['id_professor'] == $professor['id_professor'] ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($professor['nome_professor']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="turno_inicio">Data e Hora Início:</label>
            <input type="datetime-local" class="form-control" id="turno_inicio" name="turno_inicio" value="<?= htmlspecialchars($aula['turno_inicio']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="turno_fim">Data e Hora Fim:</label>
            <input type="datetime-local" class="form-control" id="turno_fim" name="turno_fim" value="<?= htmlspecialchars($aula['turno_fim']); ?>" required>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary w-100">Editar</button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-1n1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g1g