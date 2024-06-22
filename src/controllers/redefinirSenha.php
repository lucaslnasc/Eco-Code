<?php
    include('../models/user.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];

        $senhaCrip = password_hash($senha, PASSWORD_BCRYPT);

        try {
            $query = $dbh->prepare('UPDATE citizen SET senha = :senha WHERE cpf = :cpf;');

            $query->bindParam(':cpf', $cpf);
            $query->bindParam(':senha', $senhaCrip);

            $query->execute();

            echo '<script>'. 'location.href="../views/index.html" ' . '</script>';
        }catch(PDOException $e){
            echo $e;
        }
    }
?>