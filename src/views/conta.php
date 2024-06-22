<?php
session_start();
include '../models/user.php';

$query = $dbh->prepare('SELECT * FROM VW_CONTA;');
$query->execute();
$resultList = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/icons/favicon.ico" type="image/x-icon">
    <title>Conta</title>
    <link rel="stylesheet" href="../styles/conta.css">
</head>

<body>
    <div class="container">
        <nav class="app-Bar">
            <img class="image_voltar_appBar" src="../img/de-volta.png" conta onclick="contaParaHome()">
            <label for="" class="title_appBar">Conta</label>
            <div class="icone_user">
                <img src="../img/icone_user.png" alt="" class="icone_user2" onclick="homeParaConta()">
                <p id="session_paragraph">Bem vindo: <?php
                echo $_SESSION['cpf'];
                ?></p>
            </div>
        </nav>
        <div class="account">
        <div class="tabela">
                <?php
                foreach ($resultList as $list) {
                    echo '<ul>';
                    echo '<li> Ocorrido: ' . $list['ID_REPORT'] . '</li>';
                    echo '<li> OCORRIDO SELECIONADO: ' . $list['SELECIONE_OCORRIDO'] . '</li>';
                    echo '<li> CEP LOCAL: ' . $list['CEP_LOCAL'] . '</li>';
                    echo '<li> UF: ' . $list['UF'] . '</li>';
                    echo '<li> ENDERECO: ' . $list['ENDERECO'] . '</li>';
                    echo '<li> BAIRRO: ' . $list['BAIRRO'] . '</li>';
                    echo '<li> Nº: ' . $list['N'] . '</li>';
                    echo '<li> CIDADE: ' . $list['CIDADE'] . '</li>';
                    echo '<li> DESCREVA O OCORRIDO: ' . $list['DESCREVA_OCORRIDO'] . '</li>';
                    echo '<li> IMAGEM: ' . $list['IMAGEM'] . '</li>';
                    echo '<li> VIDEO: ' . $list['VIDEO'] . '</li>';
                    echo '<li> GRAU DE RISCO: ' . $list['CRITICIDADE'] . '</li>';
                    echo '</ul>';
                    echo '<hr>';
                }
                ?>

            </div>
        </div>
    <script src="../js/redirection.js"></script>
</body>

</html>