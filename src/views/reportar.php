<?php
  session_start();
  include '../models/user.php';
  $query = $dbh->prepare('SELECT * FROM repoAcontecimento;');
  $query->execute();
  $list = $query->fetchAll();

  $uf_repository = $dbh->prepare('SELECT * FROM repoUF');
  $uf_repository->execute();
  $selectUF = $uf_repository->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../styles/reportar.css" />
  <link rel="shortcut icon" href="../img/icons/favicon.ico" type="image/x-icon">
  <title>Reportar</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>
  <div class="container">

    <nav class="appBar">
      <img class="image_voltar_appBar" src="../img/de-volta.png" onclick="reportarParaHome()">
      <h1 class="title_appBar">Reportar</h1>
      <div class="icone_user">
                <img src="../img/icone_user.png" alt="" class="icone_user2" onclick="homeParaConta()">
                <p id="session_paragraph">Bem vindo: <?php
                    echo $_SESSION['cpf'];
                ?></p>
            </div>
    </nav>

    <div class="formulario">
      <form action="../controllers/reportForm.php" method="post" id="cadastroForm" enctype="multipart/form-data">
        <div class="cont1">
          <label>SELECIONE O OCORRIDO</label>
          <br />
          <select class="style_input_form"  name="SELECIONE_OCORRIDO" id="ocorrido">
            <?php
              foreach($list as $listen) {
                echo '<option value="'.$listen['id_aco'].'">'.$listen['coluna_aco'].'</option>';
              }
            ?>
          </select>
          <br /><br /><br />
          <label>CEP</label>
          <br />
          <input class="style_input_form" type="text" name=" CEP_LOCAL" id="CEP_LOCAL" oninput="convertToUpperCase()"/>
          <br /><br /><br />
          <label>ENDEREÇO</label>
          <br />
          <input class="style_input_form" type="text" name="ENDERECO" id="ENDERECO" oninput="convertToUpperCase()"/>
          <br /><br /><br />

          <label>BAIRRO</label>
          <label class="numero_input_form">Nº</label>
          <br />
          <input class="special_input_form1" type="text" name="BAIRRO" id="BAIRRO" oninput="convertToUpperCase()"/>
          <input class="menor_special_input_form1" type="text" name="N" id="N" oninput="convertToUpperCase()"/>
          <br /><br /><br />

          <label>CIDADE</label>
          <br />
          <input class="style_input_form" type="text" name="CIDADE" id="CIDADE" oninput="convertToUpperCase()"/>
        </div>
        <div class="cont2">
          <label>UF</label>
          <br />
          <select class="style_input_form"  name="UF" id="UF">
            <?php
              foreach($selectUF as $repoUF) {
                echo '<option value="'.$repoUF['id_uf'].'">'.$repoUF['coluna_uf'].'</option>';
              }
            ?>
          </select>
          <br /><br /><br />
          <label>DESCREVA O OCORRIDO</label>
          <br />
          <textarea class="area_txt" name="DESCREVA_OCORRIDO" id="DESCREVA_OCORRIDO" oninput="convertToUpperCase()"></textarea>
          <br /><br /><br /><br>
          <input type="file" name="IMAGEM" id="IMAGEM" accept="image/*">
          <input type="file" name="VIDEO" id="VIDEO" accept="video/*">
          <br><br><br>
          <input class="save_button_input_form" type="submit" value="Salvar" />

        </div>
      </form>
    </div>
  </div>
  <script src="../js/redirection.js"></script>
  <script src="../js/formatacaoTXT.js"></script>

  <script>
    $(document).ready(function(){
      $('#CEP_LOCAL').mask('00000-000');
    });
  </script>
</body>

</html>