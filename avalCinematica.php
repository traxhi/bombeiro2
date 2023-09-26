<?php
include("conecta.php");

if (isset($_POST['enviar'])) {
    if (isset($_POST['resposta1'])) {

        $valor1 = ($_POST['resposta1'] == 'sim') ? 1 : 0;

    }

    if (isset($_POST['resposta2'])) {

        $valor2 = ($_POST['resposta2'] == 'sim') ? 1 : 0;

    }

    if (isset($_POST['resposta3'])) {

        $valor3 = ($_POST['resposta3'] == 'sim') ? 1 : 0;

    }

    if (isset($_POST['resposta4'])) {

        $valor4 = ($_POST['resposta4'] == 'sim') ? 1 : 0;

    }

    if (isset($_POST['resposta5'])) {

        $valor5 = ($_POST['resposta5'] == 'sim') ? 1 : 0;

    }
    
    if (isset($_POST['resposta6'])) {

        $valor6 = ($_POST['resposta6'] == 'sim') ? 1 : 0;

    }

    if (isset($_POST['resposta7'])) {

        $valor7 = ($_POST['resposta7'] == 'sim') ? 1 : 0;

    }

        $comando = $pdo->prepare("INSERT INTO avaliacao_cinematica(disturbio_comportamento, encontrado_de_capacete, encontrado_de_cinto, para_brisas_avariado, caminhando_na_cena, painel_avariado, volante_torcido) VALUES('$valor1', '$valor2', '$valor3', '$valor4', '$valor5', '$valor6', '$valor7')");
	$resultado = $comando->execute();

}
?>

