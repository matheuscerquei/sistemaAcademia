<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="shortcut icon" type="image/x-jpg" href="biceps.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>
    <style>
        body {
            background-image: url('https://img.freepik.com/fotos-gratis/3d-interior-de-quarto-grunge-com-holofotes-e-fundo-de-atmosfera-esfumacada_1048-11333.jpg?t=st=1733696587~exp=1733700187~hmac=e701ec9432541846b8cba449b151fb61812ea21ab8f44d60544f5f6878148ecb&w=900');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <form class="container w-50 border border-3 rounded p-4 shadow" style="background-color: gray;" method="POST" action="cadastrando.php">
        <h2 class="text-center text-white">Cadastro</h2>
        <div class="mb-3">
            <label class="form-label text-white" for="tipo">Tipo</label>
            <select class="form-select" name="tipo" id="tipo">
                <option value="aluno">aluno</option>
                <option value="professor">professor</option>
            </select> <!-- Fechamento da tag select adicionado -->
        </div>
        
        <div class="mb-3">
            <label for="name" class="form-label text-white">Nome Completo</label>
            <input name="nome" type="text" class="form-control" id="name" placeholder="Digite seu nome completo" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label text-white">E-mail</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Digite seu e-mail" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label text-white">Nome de Usuário</label>
            <input name="usuario" class="form-control" id="username" placeholder="Digite seu nome de usuário" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label text-white">Senha</label>
            <input name="senha" type="password" class="form-control" id="password" placeholder="Digite sua senha" required>
        </div>
        <div class="mb-3">
            <label for="confirm-password" class="form-label text-white">Confirmar Senha</label>
            <input name="confirmar_senha" type="password" class="form-control" id="confirm-password" placeholder="Confirme sua senha" required>
        </div>
        
        <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>