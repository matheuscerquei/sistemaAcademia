<!DOCTYPE html>
<html lang="pt">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="shortcut icon" type="image/x-jpg" href="biceps.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Professor</title>
  <style>
    body {
      background-image: url('https://img.freepik.com/fotos-gratis/homem-jovem-fitness-em-estudio_7502-5016.jpg?t=st=1733922737~exp=1733926337~hmac=9325b1ce966cb470fa16896e7bb0278f46d20897e65b15579faeb15196aa638d&w=1380');
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
</head>

<body>
<div class="mb-3 container w-50 border border-3 rounded p-4 shadow" style="background-color: rgba(255, 255, 255, 0.9);">
    <h2 class="text-center text-primary mb-4">Menu Professor</h2>
    <ul class="list-group">
      <li class="list-group-item">
        <a class="text-dark" target="_blank" href="verAgendamento.php"  style="text-decoration: none; font-weight: bold;">Ver aula cadastrada</a>
      </li>
      <li class="list-group-item">
        <a class="text-dark" target="_blank"  href="cadastrarAgendamento.php" style="text-decoration: none; font-weight: bold;">Cadastrar Aula</a>
      </li>
      
    </ul>
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>