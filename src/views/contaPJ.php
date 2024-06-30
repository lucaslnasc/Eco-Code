<?php
session_start();
include '../models/user.php'; // Inclua aqui a conexão com o banco de dados

// Conecte ao banco de dados
try {
    // Prepare a consulta
    $query = $dbh->prepare('SELECT id_city_hall, razao_social, cnpj, email, telefone, cidade, bairro, cep, num_city_hall FROM city_hall WHERE cnpj = :cnpj');
    $query->bindParam(':cnpj', $_SESSION['cnpj'], PDO::PARAM_STR);
    $query->execute();
    $resultList = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
    exit;
}
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
                <img class="image_voltar_appBar" src="../img/de-volta.png" conta onclick="contaParaHome2()">
                <label for="" class="title_appBar">Conta</label>
                <div class="icone_user">
                    <img src="../img/icone_user.png" alt="" class="icone_user2" onclick="homeParaConta()">
                    <p id="session_paragraph">Bem vindo: <?php
                    echo $_SESSION['cnpj'];
                    ?></p>
                </div>
            </nav>
        <div class="account">
            <div class="tabela">
                <?php
                if (!empty($resultList)) {
                    foreach ($resultList as $list) {
                        echo '<ul>';
                        echo '<li>CÓDIGO: ' . htmlspecialchars($list['id_city_hall']) . '</li>';
                        echo '<li>RAZÃO SOCIAL: ' . htmlspecialchars($list['razao_social']) . '</li>';
                        echo '<li>CNPJ: ' . htmlspecialchars($list['cnpj']) . '</li>';
                        echo '<li>EMAIL: ' . htmlspecialchars($list['email']) . '</li>';
                        echo '<li>TELEFONE: ' . htmlspecialchars($list['telefone']) . '</li>';
                        echo '<li>CIDADE: ' . htmlspecialchars($list['cidade']) . '</li>';
                        echo '<li>BAIRRO: ' . htmlspecialchars($list['bairro']) . '</li>';
                        echo '<li>CEP: ' . htmlspecialchars($list['cep']) . '</li>';
                        echo '<li>Nº: ' . htmlspecialchars($list['num_city_hall']) . '</li>';
                        echo '</ul>';
                    }
                } else {
                    echo '<p>Nenhuma informação encontrada para o CNPJ fornecido.</p>';
                }
                ?>
            </div>
        </div>
        <script src="../js/redirection.js"></script>
</body>

</html>