<?php
require "configPDO.php";
session_start();
$email = $_POST['email'];
$senha = $_POST['senha'];

// Consulta para buscar o usuário
$sql = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
$sql->bindValue(':email', $email);
$sql->execute();

$usuario = $sql->fetch(PDO::FETCH_ASSOC);

// Verifica se o usuário foi encontrado e se a senha está correta
if ($usuario && password_verify($senha, $usuario['senha'])) {
    $_SESSION['usuario'] = [
        'id' => $usuario['id_usuario'],
        'email' => $usuario['email'],
        'tipo' => $usuario['tipo'],
    ]; // Armazene o ID do usuário na sessão

    // Login com sucesso
    if ($_SESSION['usuario']['tipo'] == "professor") {
        // Aqui você pode inserir os dados do professor na tabela 'professor'
        $id_professor = $_SESSION['usuario']['id']; // Supondo que o ID do professor seja o mesmo que o ID do usuário

        // Verifica se o professor já existe na tabela
        $checkProfessor = $pdo->prepare("SELECT * FROM professor WHERE id_professor = :id_professor");
        $checkProfessor->bindValue(':id_professor', $id_professor);
        $checkProfessor->execute();

        if (!$checkProfessor->fetch(PDO::FETCH_ASSOC)) {
            // Se não existir, insere os dados do professor
            $stmt = $pdo->prepare("INSERT INTO professor (id_professor, nome_professor, email_professor) VALUES (:id_professor, :nome_professor, :email_professor)");
            $stmt->bindValue(':id_professor', $id_professor);
            $stmt->bindValue(':nome_professor', $usuario['nome']); // Supondo que o nome do professor esteja na tabela 'usuario'
            $stmt->bindValue(':email_professor', $usuario['email']);
            $stmt->execute();
        }

        header("Location: menu_professor.php");
    } else {
        header("Location: menu_aluno.php");
    }
} else {
    // Email ou senha incorretos
    header("Location: index.php");
}
?>