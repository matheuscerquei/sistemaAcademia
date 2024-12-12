<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="table-container">
        <h2 class="text-center text-primary mb-4">Agendamento</h2>
        <form action="criar_horario.php" method="post">
            <div class="form-group">
                <label for="professor">Professor:</label>
                <input type="text" class="form-control" id="professor" name="professor" required>
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
    </div>
</div>
</body>
</html>