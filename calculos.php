<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculos em PHP</title>
</head>
<body>
    <h3>Cálculos em PHP</h3>
    <form name="calcular" action="exibir_calculo.php">
    <label for="num1">Número1:</label>
    <input type="text" name="numero1" size=5 maxlength=4 required><br>
    <label for="num2">Número2:</label>
    <input type="text" name="numero2" size=5 maxlength=4 required><br>
    <input type="submit" value="calcular" name="calcular">
    <input type="reset" value="Limpar" name="Limpar">
    </form>
</body>
</html>