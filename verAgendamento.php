<?php
require "configPDO.php";

session_start();

// Verifica se o usuário está autenticado
/*if (!isset($_SESSION['id'])) {
    header('Location: login.php'); // Redireciona para a página de login se não estiver autenticado
    exit();
}*/

// Consulta para buscar os registros de horário
$sql = $pdo->prepare("SELECT 
    a.id_aula,
    p.nome_professor AS professor,
    u.nome AS aluno,
     p.turno_inicio,
    p.turno_fim,
    a.assunto
FROM 
    agenda_aulas a
JOIN 
    professor p ON a.id_professor = p.id_professor
JOIN 
    usuario u ON a.id_aluno = u.id_aluno;");
$sql->execute();
$horarios = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-jpg" href="biceps.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Aula</title>
    <style>
        body {
            background-image: url('https://img.freepik.com/fotos-gratis/homem-jovem-fitness-em-estudio_7502-5016.jpg?t=st=1733952840~exp=1733956440~hmac=693b5ed7a1a84b801a203669830db945ed7e9f1ba3073b1395a1f458fd40a89b&w=1380');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .table-container {
            background-color: rgba(255, 255, 255, 0.8); /* Fundo branco semi-transparente */
            border-radius: 10px; /* Bordas arredondadas */
            padding: 20px; /* Espaçamento interno */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Sombra */
        }
    </style>
</head>
<body>
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="table-container">
          <h2 class="text-center text-primary mb-4">Agendamento</h2>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Professor</th>
                        <th scope="col">Aluno</th>
                        <th scope="col">Data e Hora</th>
                        <th scope="col">Duração (min)</th>
                        <th scope="col">Assunto</th>
                        <th class="table-danger" colspan="2">Ação</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($horarios as $horario): ?>
                    <tr>
                        <td><?= htmlspecialchars($horario['id_aula']); ?></td>
                        <td><?= htmlspecialchars($horario['professor']); ?></td>
                        <td><?= htmlspecialchars($horario['aluno']); ?></td>
                        <td><?= htmlspecialchars($horario['turno_inicio']); ?></td>
                        <td><?= htmlspecialchars($horario['turno_fim']); ?></td>
                        <td><?= htmlspecialchars($horario['assunto']); ?></td>
                        <td><a href="editar_horario.php?id=<?= $horario['id_aula']; ?>">Editar</a></td>
                        <td><a href="#" onclick='confirmarExclusao(<?= $horario["id_aula"] ?>)'>Excluir</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
           