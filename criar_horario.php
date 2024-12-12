<?php
require "configPDO.php";

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $id_professor = $_POST["id_professor"];
    $turno_inicio = $_POST["turno_inicio"];
    $turno_fim = $_POST["turno_fim"];
    $assunto = $_POST["assunto"];

    // Verificar se os campos estão preenchidos
    if (empty($id_professor) || empty($turno_inicio) || empty($turno_fim) || empty($assunto)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        // Verificar se o id_professor existe na tabela professor
        $sql = $pdo->prepare("SELECT COUNT(*) FROM professor WHERE id_professor = :id_professor");
        $sql->bindParam(':id_professor', $id_professor);
        $sql->execute();
        $count_professor = $sql->fetchColumn();

          // Se o id_professor não existir, exibir mensagem de erro
          if ($count_professor == 0) {
            echo "Professor não encontrado.";
        } else {
            // Inserir o agendamento na tabela agenda_aulas
            try {
                $stmt = $pdo->prepare("INSERT INTO agenda_aulas (id_professor, turno_inicio, turno_fim, assunto) VALUES (:id_professor, :turno_inicio, :turno_fim, :assunto)");

                // Bind dos parâmetros
                $stmt->bindParam(':id_professor', $id_professor);
                $stmt->bindParam(':turno_inicio', $turno_inicio);
                $stmt->bindParam(':turno_fim', $turno_fim);
                $stmt->bindParam(':assunto', $assunto);

                // Executa a instrução
                $stmt->execute();

                echo "Agendamento criado com sucesso!";
            } catch (PDOException $e) {
                echo "Erro ao criar agendamento: " . $e->getMessage();
            }
        }
    }
}
//header('location: verAgendamento.php')
?>