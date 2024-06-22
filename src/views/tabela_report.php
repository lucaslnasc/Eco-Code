<?php
session_start();
include '../models/user.php';

$query = $dbh->prepare('SELECT * FROM report');
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
            <div class="icone_user">
                <img src="../img/icone_user.png" alt="" class="icone_user2" onclick="homeParaConta()">
                <p id="session_paragraph">Bem vindo: <?php
                    echo $_SESSION['cnpj'];
                ?></p>
            </div>
        </nav>
        <div class="conteudo">
            <div class="tabela">
                <?php
                foreach ($listen as $list) {
                    echo '<ul>';
                    echo '<li> OCORRIDO: <p class="p_tbl">' . $list['ID_REPORT'] . '</p></li>';
                    echo '<li> OCORRIDO SELECIONADO: <p class="p_tbl">' . $list['SELECIONE_OCORRIDO'] . '</p></li>';
                    echo '<li> CEP LOCAL: <p class="p_tbl">' . $list['CEP_LOCAL'] . '</p></li>';
                    echo '<li> UF: <p class="p_tbl">' . $list['UF'] . '</p></li>';
                    echo '<li> ENDERECO: <p class="p_tbl">' . $list['ENDERECO'] . '</p></li>';
                    echo '<li> BAIRRO: <p class="p_tbl">' . $list['BAIRRO'] . '</p></li>';
                    echo '<li> Nº: <p class="p_tbl">' . $list['N'] . '</p></li>';
                    echo '<li> CIDADE: <p class="p_tbl">' . $list['CIDADE'] . '</p></li>';
                    echo '<li> DESCREVA O OCORRIDO: <p class="p_tbl">' . $list['DESCREVA_OCORRIDO'] . '</p></li>';
                    echo '<li>IMAGEM: <br> <img src = "'.$list['IMAGEM'].'" width="400" height="250"></li>';
                    echo '<li>Vídeo: <br> <video src = "'.$list['VIDEO'].'" width="400" height="250" controls></video></li>';
                    echo '<li> GRAU DE RISCO: <p class="p_tbl">' . $list['CRITICIDADE'] . '</p></li>';
                    echo '</ul>';
                    echo '<hr>';
                }
                ?>

            </div>
        </div>
    </div>
    <script src="../js/redirection.js"></script>
</body>

</html>