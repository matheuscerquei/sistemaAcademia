<?php
require "configPDO.php";

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
    <title>Cadastrar Agendamento</title>
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
    <form action="criar_horario.php" method="post" class="container w-50 border border-3 rounded p-4 shadow" style="background-color: gray;">
        <h2 class="text-center text-white">Cadastrar Agendamento</h2>
        
        <div class="form-group">
            <label for="professor">Professor:</label>
            <select class="form-control" id="professor" name="id_professor" required>
                <option value="">Selecione um professor</option>
                <?php foreach ($professores as $professor): ?>
                    <option value="<?= htmlspecialchars($professor['id_professor']); ?>">
                        <?= htmlspecialchars($professor['nome_professor']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="data_hora">Data e Hora:</label>
            <input type="datetime-local" class="form-control" id="data_hora" name="turno_inicio" required>
        </div>
        
        <div class="form-group">
            <label for="duracao">Duração (min):</label>
            <input type="number" class="form-control" id="duracao" name="turno_fim" required>
        </div>
        
        <div class="form-group">
            <label for="assunto">Assunto:</label>
            <input type="text" class="form-control" id="assunto" name="assunto" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Criar Agendamento</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>