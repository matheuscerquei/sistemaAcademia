<?php
require "configPDO.php";

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $id_professor = $_POST["id_professor"];
    $id_aluno = $_POST["id_aluno"];
    $turno_inicio = $_POST["turno_inicio "];
    $turno_fim= $_POST["turno_fim"];
    $assunto = $_POST["assunto"];

    // Verificar se os campos estão preenchidos
    if (empty($id_professor) || empty($id_aluno) || empty($turno_inicio) || empty($turno_fim) || empty($assunto)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        // Criar o novo agendamento
        $sql = "INSERT INTO agenda_aulas (id_professor, id_aluno, turno_inicio, turno_fim, assunto) VALUES ('$id_professor', '$id_aluno', '$turno_inicio', '$turno_fim', '$assunto')";
        if ($conn->query($sql) === TRUE) {
            echo "Agendamento criado com sucesso!";
        } else {
            echo "Erro ao criar agendamento: " . $conn->error;
        }
    }
}



?>