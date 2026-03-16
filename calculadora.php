<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora PHP</title>
</head>
<body>

    <form method="POST" action="">
        <input type="number" name="n1" step="any" placeholder="Número 1" required>
        <input type="number" name="n2" step="any" placeholder="Número 2" required>

        <p>Escolha a operação:</p>
        <label><input type="radio" name="operacao" value="soma" checked> Somar</label><br>
        <label><input type="radio" name="operacao" value="sub"> Subtrair</label><br>
        <label><input type="radio" name="operacao" value="mult"> Multiplicar</label><br>
        <label><input type="radio" name="operacao" value="div"> Dividir</label><br><br>

        <button type="submit" name="calcular">Calcular</button>
    </form>

    <hr>

    <?php
    if (isset($_POST['calcular'])) {
        $n1  = $_POST['n1'];
        $n2  = $_POST['n2'];
        $op  = $_POST['operacao'];
        $res = 0;

        switch ($op) {
            case 'soma': $res = $n1 + $n2; break;
            case 'sub':  $res = $n1 - $n2; break;
            case 'mult': $res = $n1 * $n2; break;
            case 'div':  
                $res = ($n2 != 0) ? ($n1 / n2) : "Erro: Divisão por zero";
                break;
        }

        echo "<h3>Resultado: $res</h3>";
    }
    ?>

</body>
</html>