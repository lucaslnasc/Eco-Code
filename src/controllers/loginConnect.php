<?php

    include('../models/user.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $ddd = $_POST['ddd'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha']; // Ajustado para $senha em vez de $passoword
        $cep = $_POST['cep'];
        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];
        $number_casa = $_POST['n']; // Ajustado para $number_casa em vez de $numberCasa
        $cidade = $_POST['cidade'];

        $emailExists = checkIfExists('email', $email);

        if ($emailExists) {
            echo json_encode(array('status' => 'error', 'message' => 'O e-mail já está cadastrado no sistema.'));
            exit;
        }

        $senhaCrip = password_hash($senha, PASSWORD_BCRYPT);

        try {
            $query = $dbh->prepare('INSERT INTO citizen (nome_completo, email, cpf, ddd, telefone, senha, cep, endereco, bairro, num, cidade) 
            VALUES (:nome, :email, :cpf, :ddd, :telefone, :senha, :cep, :endereco, :bairro, :number_casa, :cidade);');

            $query->bindParam(':nome', $nome);
            $query->bindParam(':email', $email);
            $query->bindParam(':cpf', $cpf);
            $query->bindParam(':ddd', $ddd);
            $query->bindParam(':telefone', $telefone);
            $query->bindParam(':senha', $senhaCrip);
            $query->bindParam(':cep', $cep);
            $query->bindParam(':endereco', $endereco);
            $query->bindParam(':bairro', $bairro);
            $query->bindParam(':number_casa', $number_casa);
            $query->bindParam(':cidade', $cidade);

            $query->execute();

            header('Location: ../views/index.html');
            exit;
            
        } catch (PDOException $e) {
            die("Erro ao inserir usuário: " . $e->getMessage());
        }
    }
?>