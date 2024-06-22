<?php
include ('../models/user.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $select_ocorrido = $_POST['SELECIONE_OCORRIDO'];
    $cep = $_POST['CEP_LOCAL'];
    $endereco = $_POST['ENDERECO'];
    $bairro = $_POST['BAIRRO'];
    $n = $_POST['N'];
    $cidade = $_POST['CIDADE'];
    $uf = $_POST['UF'];
    $descricao_ocorrido = $_POST['DESCREVA_OCORRIDO'];
    $criticidade;

    if (isset($_FILES['IMAGEM']) && !empty($_FILES['IMAGEM'])) {
        $imagem = '../repoImg/'.$_FILES['IMAGEM']['name'];
        move_uploaded_file($_FILES['IMAGEM']['tmp_name'], $imagem);
    } else {
        $imagem = '';
    }

    if (isset($_FILES['IMAGEM']) && !empty($_FILES['IMAGEM'])) {
        $video = '../repoImg/'.$_FILES['VIDEO']['name'];
        move_uploaded_file($_FILES['VIDEO']['tmp_name'], $video);
    } else {
        $video = '';
    }

    if ($select_ocorrido === 'FIAÇÃO') {
        $criticidade = 'BAIXO';
    } else if ($select_ocorrido === 'ACÚMULO DE LIXO' || $select_ocorrido === 'ENTULHO') {
        $criticidade = 'MÉDIO';
    } else if ($select_ocorrido === 'DESABAMENTO' || $select_ocorrido === 'ALAGAMENTO') {
        $criticidade = 'ALTO';
    }

    try {
        $query = $dbh->prepare('INSERT INTO report (SELECIONE_OCORRIDO, CEP_LOCAL, UF, ENDERECO, BAIRRO, N, CIDADE, DESCREVA_OCORRIDO, IMAGEM, VIDEO, CRITICIDADE) VALUES(:SELECIONE_OCORRIDO, :CEP_LOCAL, :UF, :ENDERECO, :BAIRRO, :N, :CIDADE, :DESCREVA_OCORRIDO, :IMAGEM, :VIDEO, :CRITICIDADE); ');

        $query->bindParam(':SELECIONE_OCORRIDO', $select_ocorrido);
        $query->bindParam(':CEP_LOCAL', $cep);
        $query->bindParam(':UF', $uf);
        $query->bindParam(':ENDERECO', $endereco);
        $query->bindParam(':BAIRRO', $bairro);
        $query->bindParam(':N', $n);
        $query->bindParam(':CIDADE', $cidade);
        $query->bindParam(':DESCREVA_OCORRIDO', $descricao_ocorrido);
        $query->bindParam(':IMAGEM', $imagem);
        $query->bindParam(':VIDEO', $video);
        $query->bindParam(':CRITICIDADE', $criticidade);

        $query->execute();

        echo '<script src="../js/sucessForm.js"></script>';
    } catch (PDOException $e) {
        echo $e;
    }
} else {
    echo 'Erro ao realizar report';
    die();
}
?>