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
    <form action="">
        <div class="container">
            <nav class="app-Bar">
                <img class="image_voltar_appBar" src="../img/de-volta.png" conta onclick="contaParaHome2()">
                <label for="" class="title_appBar">Conta</label>
                <div class="icone_user">
                    <img src="../img/icone_user.png" alt="" class="icone_user2" onclick="homeParaConta()">
                    <p id="session_paragraph">Bem vindo: <?php
                    echo $_SESSION['cnpj'];
                    ?></p>
                </div>
            </nav>
            <div class="childrens_container"><br><br>
                <div class="child"><label for="" class="grey">Nome: <?php
                foreach ($resultList as $list) {
                    echo $list['nome_completo'];
                }
                ?></label></div>
                <div class="child"><label for="" class="grey">CNPJ:
                        <?php
                        foreach ($resultList as $list) {
                            echo $list['cnpj'];
                        }
                        ?>
                    </label></div>
                <div class="child"><label for="">E-Mail:
                        <?php
                        foreach ($resultList as $list) {
                            echo $list['email'];
                        }
                        ?>
                    </label></div>
                <div class="child"><label for="">Telefone:
                        <?php
                        foreach ($resultList as $list) {
                            echo $list['telefone'];
                        }
                        ?>
                    </label></div><br>
                <div class="child"><label for="" class="endereco"><b>Endereço</b></label></div>
                <div class="child"><label for="">Cidade:
                        <?php
                        foreach ($resultList as $list) {
                            echo $list['cidade'];
                        }
                        ?>
                    </label></div>
                <div class="child"><label for="">Bairro:
                        <?php
                        foreach ($resultList as $list) {
                            echo $list['bairro'];
                        }
                        ?>
                    </label></div>
                <div class="child"><label for="">Cep:
                        <?php
                        foreach ($resultList as $list) {
                            echo $list['cep'];
                        }
                        ?>
                    </label></div>
                <div class="child"><label for="">N°:
                        <?php
                        foreach ($resultList as $list) {
                            echo $list['num'];
                        }
                        ?>
                    </label></div>
                <div class="child"><label for="">UF: ES</label></div>

                <div class="lateral_right">
                    <button class="bt_one" onclick="">
                        <img src="../img/lapis.png" alt="" class="img_lapis">
                    </button><br>
                    <button class="bt_one" onclick="">
                        <img src="../img/lapis.png" alt="" class="img_lapis">
                    </button><br>
                    <button class="bt">
                        <img src="../img/lapis.png" alt="" class="img_lapis">
                    </button>
                </div>
            </div>
        </div>
    </form>
    <script src="../js/redirection.js"></script>
</body>

</html>