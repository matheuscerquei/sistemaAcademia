<?php
require "configPDO.php";
session_start();
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
$sql->bindValue(':email', $email);
$sql->execute();


$usuario = $sql->fetch(PDO::FETCH_ASSOC);

// Verifica se o usuário foi encontrado e se a senha está correta
if ($usuario && password_verify($senha, $usuario['senha'])) {


    $_SESSION['usuario'] = [
        'id' => $usuario['ID_usuario'],
        'email' => $usuario['email'],
        'tipo' => $usuario['tipo'],
    ]; // Armazene o ID do usuário na sessão
    // Login com sucesso

    if ($_SESSION['usuario']['tipo'] == "professor") {
        header("Location: menu_professor.php");
    } else {
        header("Location: menu_aluno.php");
    }
} else {
    // Email ou senha incorretos
    header("Location: index.php");
}
?>