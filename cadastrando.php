<?php
require "configPDO.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar_senha = $_POST['confirmar_senha'];





// Verifica se as senhas são iguais
if ($senha !== $confirmar_senha) {
    echo "As senhas não coincidem.";
    exit; // Encerra o script se as senhas não coincidirem

}

// Aqui você pode adicionar a lógica para inserir os dados no banco de dados
try {
    // Prepare a instrução SQL
    $stmt = $pdo->prepare("INSERT INTO usuario (nome, email ,senha) VALUES (:nome,:email, :senha)");

    // Bind dos parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    // É recomendável usar password_hash para armazenar senhas de forma segura
    $hashedPassword = password_hash($senha, PASSWORD_DEFAULT);
    $stmt->bindParam(':senha', $hashedPassword);

    // Executa a instrução
    $stmt->execute();

    echo "Cadastro realizado com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao cadastrar: " . $e->getMessage();
}
header('Location: index.php');
?>