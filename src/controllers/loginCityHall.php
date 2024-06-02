<?php

include('../models/cityHall.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $razao_social = $_POST['razao_social'];
    $email = $_POST['email'];
    $cnpj = $_POST['cnpj'];
    $ddd = $_POST['ddd'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senhaPrefeitura'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $num_city_hall = $_POST['num_city_hall'];
    $cidade = $_POST['cidade'];

    try {
        $emailExist = checkIfExists('email', $email);
        $cnpjExist = checkIfExists('cnpj', $cnpj);

        if ($emailExist) {
            echo json_encode(array('status' => 'error', 'message' => 'O e-mail já está cadastrado no sistema.'));
            exit;
        } else if ($cnpjExist) {
            echo json_encode(array('status' => 'error', 'message' => 'O cnpj já está cadastrado no sistema.'));
            exit;
        }

        $senhaCrip = password_hash($senha, PASSWORD_BCRYPT);

        $query = $dbh->prepare('INSERT INTO city_hall (razao_social, email, cnpj, ddd, telefone, senha, cep, endereco, bairro, num_city_hall, cidade) 
        VALUES (:razao_social, :email, :cnpj, :ddd, :telefone, :senha, :cep, :endereco, :bairro, :num_city_hall, :cidade)');

        $query->bindParam(':razao_social', $razao_social);
        $query->bindParam(':email', $email);
        $query->bindParam(':cnpj', $cnpj);
        $query->bindParam(':ddd', $ddd);
        $query->bindParam(':telefone', $telefone);
        $query->bindParam(':senha', $senhaCrip);
        $query->bindParam(':cep', $cep);
        $query->bindParam(':endereco', $endereco);
        $query->bindParam(':bairro', $bairro);
        $query->bindParam(':num_city_hall', $num_city_hall);
        $query->bindParam(':cidade', $cidade);

        $query->execute();

        header('Location: ../views/index.html');
        exit;

    } catch (PDOException $e) {
        die("Erro ao inserir usuário: " . $e->getMessage());
    } catch (InvalidArgumentException $e) {
        die("Erro: " . $e->getMessage());
    }
}
?>