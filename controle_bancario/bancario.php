<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle Bancário</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <div class="container">
  <h3>💰 CONTROLE BANCÁRIO 💰</h3>
    <div id="content">
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $nome_correntista = $_POST["nome"];
      echo "<b>Nome do correntista:</b> " . $nome_correntista;
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
      echo "<br> <b>Nome do banco:</b> " . $banco;
      $numero_conta = $_POST["numero_conta"];
      $agencia = $_POST["agencia"];
      echo "<br> <b>Agência:</b> " . $agencia;
      echo "<br> <b>Número do conta:</b> " . $numero_conta;
      $tipo_conta = $_POST["tipo_conta"];
      if ($tipo_conta == "on") {
        $tipo_conta = "Conta Especial";
      } else {
        $tipo_conta = "Conta Comum";
      }
      echo "<br> <b>Tipo de conta: </b>" . $tipo_conta;
      $data_abertura = $_POST["data_abertura"];
      echo "<br> <b>Data de abertura: </b>" . $data_abertura;
      $saldo_inicial = $_POST["saldo_inicial"];
      $deposito = $_POST["deposito"];
      echo "<div class='valores'>";
      echo "<div id='saldo'>";
      echo "<b>Saldo inicial: </b><br>R$" . $saldo_inicial;
      echo "</div>";
      echo "<div id='deposito'>";
      echo "<b>Deposito: </b><br>R$" . $deposito;
      echo "</div>";
      echo "</div>";
    } else {
      echo "<h3>É necessário criar um cadastro</h3>";
      echo "<a href='index.html'>Cadastro de conta</a>";
    } ?>
    </div>
    </div>
</body>
</html>