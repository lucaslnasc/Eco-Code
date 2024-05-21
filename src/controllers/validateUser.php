<?php
    session_start(); // Inicia a sessão

    include("../../database/conexao.php");

    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    if (empty($cpf) || empty($senha)) {
        echo "<script>alert('Campos obrigatórios vazios')</script>";
    } else {
        try {
            $query = $dbh->prepare("SELECT id_citizen, cpf, senha FROM citizen WHERE cpf = :cpf");
            $query->execute(array(':cpf' => $cpf));
            $resultado = $query->fetch();

            if (empty($resultado) || !password_verify($senha, $resultado['senha'])) {
                echo "<script>
                alert('Usuário e/ou senha inválidos');
                window.location.href='../views/index.html';
                </script>";
            } else {
                $_SESSION['id_citizen'] = $resultado['id_citizen'];
                $_SESSION['cpf'] = $resultado['cpf'];
                header('Location: ../views/home.html');
            }
        } catch (Exception $e) {
            echo "<script>alert('Ocorreu um erro: ".$e->getMessage()."');</script>";
        }
    }
?>
