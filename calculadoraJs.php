<?php
$inputJSON = file_get_contents('php://input');
$dados = json_decode($inputJSON, true);

if ($_SERVER["REQUEST_METHOD"] == "POST" && $dados) {
    header("Content-Type: application/json");
    
    $a = isset($dados["a"]) ? (float)$dados["a"] : 0;
    $b = isset($dados["b"]) ? (float)$dados["b"] : 0;
    $operador = $dados["operador"] ?? "";
    $resultado = 0;

    switch ($operador) {
        case "soma": 
            $resultado = $a + $b; 
            break;
        case "sub": 
            $resultado = $a - $b; 
            break;
        case "multi": 
            $resultado = $a * $b; 
            break;
        case "divide": 
            $resultado = ($b != 0) ? ($a / $b) : "Erro: Divisão por zero"; 
            break;
        default: 
            $resultado = "Operador inválido";
    }

    echo json_encode(["resultado" => $resultado]);
    exit; 
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    
</head>
<body>
    <div class="container">
        <h1>Calculadora!</h1>

        <div class="campo">
            <label>Valor A:</label>
            <input type="number" id="numA">
        </div>
        <div class="campo">
            <label>Valor B:</label>
            <input type="number" id="numB">
        </div>

        <div>
            <strong>Operação:</strong><br>
            <input type="radio" name="operador" value="soma" checked> Soma<br>
            <input type="radio" name="operador" value="sub"> Subtração<br>
            <input type="radio" name="operador" value="multi"> Multiplicação<br>
            <input type="radio" name="operador" value="divide"> Divisão
        </div>
        <br>
        <button type="button" id="btnCalcular">Calcular Agora</button>

        <h2 id="res">Resultado: ---</h2>
    </div>

    <script>
        document.getElementById('btnCalcular').onclick = async () => {
            const payload = {
                a: parseFloat(document.getElementById('numA').value || 0),
                b: parseFloat(document.getElementById('numB').value || 0),
                operador: document.querySelector('input[name="operador"]:checked').value
            };

            try {
                const response = await fetch('', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(payload)
                });

                const data = await response.json();
                document.getElementById('res').innerText = "Resultado: " + data.resultado;
            } catch (error) {
                document.getElementById('res').innerText = "Erro ao calcular.";
            }
        };
    </script>
</body>
</html>
