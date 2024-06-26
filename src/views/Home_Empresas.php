<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../styles/Home_Empresas.css">
    <title>Inicio</title>
</head>
<body>
    <div class="container">
        <nav class="appBar">
            <img class="image_voltar_appBar" src="../img/de-volta.png" onclick="VoltarDeHomeEmpresasParaLogin()">
            <h1 class="title_appBar">Início</h1>
            <div class="icone_user">
                <img src="../img/icone_user.png" alt="" class="icone_user2" onclick="homeParaConta2()">
                <p id="session_paragraph">Bem vindo: <?php
                    echo $_SESSION['cnpj'];
                ?></p>
            </div>
        </nav>
        <div class="body_div_buttons">
            <div class="cont">
                <div class="button_acess">
                    <button class="bt" onclick="AcessoHomeEmpresasParaTabelaReport()">
                        <img class="img_button" src="../img/pessoa.png">
                        <h2 class="h2_button">REPORTES RECEBIDOS</h2>
                    </button>
                </div>
                <div class="button_acess">
                    <button class="bt" onclick="homeParaConfiguracoes()">
                        <img class="img_button2" src="../img/Engrenagem.png">
                        <h2 class="h2_button">CONFIGURAÇÃO</h2>
                    </button>
                </div>
                <p class="position_suport">Instabilidade no aplicativo?</p>
                <div class="button_acess">
                    <button class="bt" onclick="Suporte()">
                        <img class="img_button" src="../img/suporte-online.png">
                        <h2 class="h2_button">SUPORTE</h2>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/redirection.js"></script>
</body>
</html>