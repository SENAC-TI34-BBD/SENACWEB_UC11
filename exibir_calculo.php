<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <h3 align="center">CALCULAR E EXIBE O CÁUCULO</h3>
<?php
$num1 = $_GET["numero1"];
$num2 = $_GET["numero2"];
$resultado = $num1 + $num2;

echo "<br><br><b>Resultado = </b>" . $resultado . "<br>";
echo '<a href="calculos.php"/>Voltar</a>';
?>    
</body>
</html>
