<?php
require "configPDO.php";

session_start();

// Verifica se o ID da aula foi passado
if (isset($_GET['id'])) {
    $id_aula = $_GET['id'];

    // Prepara a consulta para excluir o agendamento
    $sql = $pdo->prepare("DELETE FROM agenda_aulas WHERE id_aula = :id_aula");
    $sql->bindParam(':id_aula', $id_aula);

    // Executa a exclusão
    if ($sql->execute()) {
        // Redireciona de volta para a página de agendamentos com uma mensagem de sucesso
        header("Location: verAgendamento.php?msg=Agendamento excluído com sucesso.");
    } else {
        // Redireciona de volta com uma mensagem de erro
        header("Location: verAgendamento.php?msg=Erro ao excluir agendamento.");
    }
} else {
    // Redireciona se não houver ID
    header("Location: verAgendamento.php");
}
?>