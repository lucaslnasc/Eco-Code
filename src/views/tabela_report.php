<?php
include '../models/user.php';

$query = $dbh->prepare('SELECT ID_REPORT FROM report INNER JOIN citizen ON report.ID_REPORT = citizen.id_citizen;');
$query->execute();
$listen = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/tabela_report.css">
    <link rel="shortcut icon" href="../img/icons/favicon.ico" type="image/x-icon">
    <title>TABELA DE REPORT</title>
</head>

<body>
    <div class="container">
        <nav class="appBar">
            <img class="image_voltar_appBar" src="../img/de-volta.png" onclick="VoltarTabelaParaHomeEmpresa()">
            <h1 class="title_appBar">TABELA DE REPORT</h1>
        </nav>
        <div class="conteudo">
            <div class="tabela">
                <?php
                foreach ($listen as $list) {
                    echo '<ul>';
                    echo '<li> Ocorrido: ' . $list['ID_REPORT'] . '</li>';
                    echo '<li> SELECIONE OCORRIDO: ' . $list['SELECIONE_OCORRIDO'] . '</li>';
                    echo '<li> CEP LOCAL: ' . $list['CEP_LOCAL'] . '</li>';
                    echo '<li> UF: ' . $list['UF'] . '</li>';
                    echo '<li> ENDERECO: ' . $list['ENDERECO'] . '</li>';
                    echo '<li> BAIRRO: ' . $list['BAIRRO'] . '</li>';
                    echo '<li> Nº: ' . $list['N'] . '</li>';
                    echo '<li> CIDADE: ' . $list['CIDADE'] . '</li>';
                    echo '<li> DESCREVA O OCORRIDO: ' . $liste['DESCREVA_OCORRIDO'] . '</li>';
                    echo '<li> IMAGEM: ' . $list['IMAGEM'] . '</li>';
                    echo '<li> VIDEO: ' . $list['VIDEO'] . '</li>';
                    echo '</ul>';
                }
                ?>

            </div>
        </div>
    </div>
    <script src="../js/redirection.js"></script>
</body>

</html>