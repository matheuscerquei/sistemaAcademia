<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="shortcut icon" type="image/x-jpg" href="biceps.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <style>
        body {
            background-image: url('https://img.freepik.com/fotos-gratis/3d-interior-de-quarto-grunge-com-holofotes-e-fundo-de-atmosfera-esfumacada_1048-11333.jpg?t=st=1733696587~exp=1733700187~hmac=e701ec9432541846b8cba449b151fb61812ea21ab8f44d60544f5f6878148ecb&w=900'); /* Substitua pelo URL da sua imagem */
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
    <form class="container w-50 border border-3 rounded p-4 shadow" style="background-color: gray ;" method="POST" action="logando.php">
        <h2 class="text-center text-white">Login</h2>
        <div class="mb-3">
            <label for="email" class="form-label text-white">email</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Digite seu nome de usuário" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label text-white">Senha</label>
            <input name="senha" type="password" class="form-control" id="password" placeholder="Digite sua senha" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
        <div class="text-center mt-3">
            <a href="cadastro.php" class="text-white" target="_blank">Não tem uma conta? Cadastre-se aqui! </a>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>