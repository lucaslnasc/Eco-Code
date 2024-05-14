<?php
$dsn = 'mysql:dbname=eco_code;host=127.0.0.1;port=3306';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Erro na conexão: ' . $e->getMessage();
}
?>