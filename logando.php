<?php
require "configPDO.php";
 $email = $_POST['email'];
 $senha = $_POST['senha'];

 $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
 $sql->bindValue(':email', $email);
 $sql->execute();

 $usuario = $sql->fetch(PDO::FETCH_ASSOC);

 // Verifica se o usuário foi encontrado e se a senha está correta
 if ($usuario && password_verify($senha, $usuario['senha'])) {
     // Login com sucesso
     echo "login feito com sucesso";
     return $usuario; // Retorna os dados do usuário
 } else {
     // Email ou senha incorretos
     echo"tente de novo";
     return false;
 }

?>