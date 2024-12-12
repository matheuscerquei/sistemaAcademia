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
    a.turno_inicio,
    a.turno_fim,
    a.assunto
FROM 
    agenda_aulas a
JOIN 
    professor p ON a.id_professor = p.id_professor
");

$sql->execute();
$horarios = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-jpg" href="biceps.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Aulas Cadastradas</title>
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
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            max-width: 90%;
            overflow: auto;
        }

        .table th {
            background-color: #007bff;
            color: white;
        }

        .table td {
            vertical-align: middle;
        }

        .table a {
            text-decoration: none;
            color: #007bff;
        }

        .table a:hover {
            text-decoration: underline;
        }

        .btn {
            margin: 0 5px;
        }

        .alert {
            margin-bottom: 20px;
        }
    </style>
    <script>
        function confirmarExclusao(id) {
            if (confirm("Tem certeza que deseja excluir esta aula?")) {
                window.location.href = "excluir_horario.php?id=" + id; // Redireciona para a página de exclusão
            }
        }
    </script>
</head>

<body>
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="table-container">
            <h2 class="text-center text-primary mb-4">Aulas Cadastradas</h2>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Professor</th>
                        <th scope="col">Data e Hora Início</th>
                        <th scope="col">Data e Hora Fim</th>
                        <th scope="col">Assunto</th>
                        <th class="table-danger" colspan="2">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($horarios as $horario): ?>
                        <tr>
                            <td><?= htmlspecialchars($horario['id_aula']); ?></td>
                            <td><?= htmlspecialchars($horario['professor']); ?></td>
                            <td><?= htmlspecialchars($horario['turno_inicio']); ?></td>
                            <td><?= htmlspecialchars($horario['turno_fim']); ?></td>
                            <td><?= htmlspecialchars($horario['assunto']); ?></td>
                            <td>
                                <a href="editarHorario.php?id=<?= $horario['id_aula']; ?>" class="btn btn-warning btn-sm">Editar</a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmarExclusao(<?= $horario['id_aula']; ?>)" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>