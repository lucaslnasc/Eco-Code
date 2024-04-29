<<<<<<< HEAD
<?php
include('../eco-code/database/conexao.php');

function checkIfExists($column, $value){
    global $dbh;

    // Prepara a consulta SQL para contar quantas vezes o valor aparece na coluna especificada
    $query = $dbh->prepare("SELECT COUNT(*) as count FROM usuario WHERE $column = :value");
    $query->bindParam(':value', $value); // Substitui o marcador de posição na consulta pelo valor fornecido
    $query->execute(); // Executa a consulta
    $result = $query->fetch(PDO::FETCH_ASSOC); // Obtém o resultado da consulta como um array associativo

    // Retorna true se o valor já existe na coluna, caso contrário, retorna false
    return $result['count'] > 0;
}
=======
<?php
include('../../database/conexao.php');

function checkIfExists($column, $value){
    global $dbh;

    // Prepara a consulta SQL para contar quantas vezes o valor aparece na coluna especificada
    $query = $dbh->prepare("SELECT COUNT(*) as count FROM citizen WHERE $column = :value");
    $query->bindParam(':value', $value); // Substitui o marcador de posição na consulta pelo valor fornecido
    $query->execute(); // Executa a consulta
    $result = $query->fetch(PDO::FETCH_ASSOC); // Obtém o resultado da consulta como um array associativo

    // Retorna true se o valor já existe na coluna, caso contrário, retorna false
    return $result['count'] > 0;
}
>>>>>>> c979a5f0617307fb1c196cee8e5aae057048a83c
?>