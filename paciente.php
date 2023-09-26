<?php
include("conecta.php");

    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $idade = $_POST["idade"];
    $telefone = $_POST["telefone"];
    $local = $_POST["local"];
    $nomeAcompanhante = $_POST["nomeAcompanhante"];
    $idadeAcompanhante = $_POST["idadeAcompanhante"];

    $stmt = $pdo->prepare("SELECT id_paciente FROM dados_paciente WHERE cpf_paciente = ?");
    $stmt->execute([$cpf]);
    $pacienteexisteId = $stmt->fetchColumn();

    if ($pacienteexisteId) {
        $comandoPaciente = $pdo->prepare("UPDATE dados_paciente SET nome_paciente = ?, idade_paciente = ?, fone_paciente = ?, local_ocorrencia = ? WHERE id_paciente = ?");
        $resultadoPaciente = $comandoPaciente->execute([$nome, $idade, $telefone, $local, $pacienteexisteId]);
    } else {
        $comandoPaciente = $pdo->prepare("INSERT INTO dados_paciente (nome_paciente, cpf_paciente, idade_paciente, fone_paciente, local_ocorrencia) VALUES (?, ?, ?, ?, ?)");
        $resultadoPaciente = $comandoPaciente->execute([$nome, $cpf, $idade, $telefone, $local]);
        $pacienteexisteId = $pdo->lastInsertId(); 
    }

    if ($resultadoPaciente) {
        $comandoAcompanhante = $pdo->prepare("INSERT INTO dados_acompanhante (nome_acompanhante, idade_acompanhante, id_paciente) VALUES (?, ?, ?)");
        $resultadoAcompanhante = $comandoAcompanhante->execute([$nomeAcompanhante, $idadeAcompanhante, $pacienteexisteId]);
        
        if ($resultadoAcompanhante) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }

?>
