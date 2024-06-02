<?php
session_start(); // Inicia a sessão
include("../../database/conexao.php");

// Função para redirecionar com mensagem de erro
function redirectWithError($message) {
    echo "<script>
            alert('$message');
            window.location.href='../views/index.html';
          </script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifier = $_POST['identifier'];
    $senha = $_POST['senha'];

    if (empty($identifier) || empty($senha)) {
        redirectWithError('Campos obrigatórios vazios');
    }

    try {
        // Tentativa de login como cidadão
        $query = $dbh->prepare("SELECT id_citizen, cpf, senha FROM citizen WHERE cpf = :identifier");
        $query->execute(array(':identifier' => $identifier));
        $resultado = $query->fetch();

        if (!empty($resultado) && password_verify($senha, $resultado['senha'])) {
            $_SESSION['id_citizen'] = $resultado['id_citizen'];
            $_SESSION['cpf'] = $resultado['cpf'];
            header('Location: ../views/home.html');
            exit();
        }

        // Tentativa de login como prefeitura
        $query = $dbh->prepare("SELECT id_city_hall, cnpj, senha FROM city_hall WHERE cnpj = :identifier");
        $query->execute(array(':identifier' => $identifier));
        $resultado = $query->fetch();

        if (!empty($resultado) && password_verify($senha, $resultado['senha'])) {
            $_SESSION['id_city_hall'] = $resultado['id_city_hall'];
            $_SESSION['cnpj'] = $resultado['cnpj'];
            header('Location: ../views/home_Empresas.html');
            exit();
        }

        // Se nenhum login for bem-sucedido
        redirectWithError('Usuário e/ou senha inválidos');
    } catch (Exception $e) {
        echo "<script>alert('Ocorreu um erro: ".$e->getMessage()."');</script>";
    }
}
?>
