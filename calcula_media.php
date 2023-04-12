<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibe média</title>
</head>
<body>
    <?php
    echo "<h3>CALCULA E EXIBE A MÉDIA</h3>";
    $aluno = $_POST["aluno"];
    $disciplina = $_POST["disciplina"];
    echo "<b>Aluno.......:</b> " . $aluno;
    echo "<br>";
    echo "<b>Disciplina:</b> " . $disciplina;
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $media = ($nota1 + $nota2) / 2;
    $frequencia = $_POST["frequencia"];
    echo "<br> <b>Nota[1]:</b> " . $nota1;
    echo "<br> <b>Nota[2]:</b> " . $nota2;
    echo "<br> <b>A média é:</b> " . $media;
    echo "<br> <b>Frequência:</b> " . $frequencia . "%";

    if ($media >= 7 && $frequencia >= 75) {
      echo "<br><br> <b>Aprovado</b>";
    } else {
      echo "<br><br> <b>Reprovado</b>";
    }
    ?>
</body>
</html>