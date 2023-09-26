<?php
include("conecta.php");

if (isset($_POST['enviar'])) {

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $diretorio_destino = 'caminho/para/diretorio/';

        $nome_arquivo = $_FILES['imagem']['name'];

        $caminho_completo = $diretorio_destino . $nome_arquivo;


        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_completo)) {

            $sql = "INSERT INTO imagem_acidente (imagem) VALUES (?)";


            $stmt = mysqli_prepare($conexao, $sql);


            mysqli_stmt_bind_param($stmt, 's', $nome_arquivo);


            if (mysqli_stmt_execute($stmt)) {
                echo "Imagem enviada com sucesso para o banco de dados.";
            } else {
                echo "Erro ao enviar a imagem para o banco de dados: " . mysqli_error($conexao);
            }


            mysqli_stmt_close($stmt);
        } else {
            echo "Erro ao fazer o upload da imagem.";
        }
    } else {
        echo "Nenhuma imagem foi enviada.";
    }
}
?>
