<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle Bancário</title>
</head>
<body>
    <?php
    echo "<h3>CONTROLE BANCÁRIO:</h3>";
    $nome_correntista = $_POST["nome"];
    echo "Nome do correntista: " . $nome_correntista;
    $banco = $_POST["banco"];
    if ($banco == "santander") {
      $banco = "Banco Santander";
    } elseif ($banco == "brasil") {
      $banco = "Banco do Brasil";
    } elseif ($banco == "caixa") {
      $banco = "Caixa Econômica Federal";
    } elseif ($banco == "bradesco") {
      $banco = "Banco Bradesco";
    } elseif ($banco == "itau") {
      $banco = "Banco Itaú";
    } elseif ($banco == "mercantil") {
      $banco = "Banco Mercantil";
    } else {
      $banco = "--";
    }
    echo "<br> Nome do banco: " . $banco;
    ?>
</body>
</html>