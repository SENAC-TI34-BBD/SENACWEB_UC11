<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 32pt;
            font-weight: bold;
        }
        #correto{
            width: 1920px;
            height: 100vh;
            background-color: #C8E6C9;
            color: #2E7D32;
        }
        #incorreto{
            width: 1920px;
            height: 100vh;
            background-color: #FFCDD2;
            color: #B71C1C;
        }
        p, a{
            margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
        }
        a{
            color: white;
            font-size: 24pt;
            font-weight: regular;
            text-decoration: none;
            display: block;
            padding: 25px;
            background-color: #6A1B9A;
            border-radius: 4px;
        }
    </style>
    <title>Exibe e valida login e senha</title>
</head>
<body>
    <?php
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if ($email == "teste@teste.com" && $senha == "123456") {
      echo '<div id="correto" class="background">';
      echo '<p>E-mail e Senha está correto!<br><br><br><br><br><a href="login.html"/>VOLTAR</a></p>';
      echo "</div>";
    } else {
      echo '<div id="incorreto" class="background">';
      echo '<p>E-mail e Senha está incorreto!<br><br><br><br><br><a href="login.html"/>VOLTAR</a></p>';
      echo "</div>";
    }
    ?>

</form>
</body>
</html>