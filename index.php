
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$n1 = (float)$_POST["n1"];
	$n2 = (float)$_POST["n2"];
	$operacao = strtolower($_POST["op"]);

switch ($operacao) {

	case "+":
	case "soma":
		$resultado = $n1 + $n2;
		break;
	case "-":
	case "subtracao":
	   	$resultado = $n1 - $n2;
		break;
	case "*":
	case "multiplicacao":
		$resultado = $n1 * $n2;
		break;
	case "/":
	case "divisao":
		$resultado = ($n2 != 0) ? $n1 / $n2 : "Erro: Divisão por zero";
		break;
	default:
		$resultado = "Opção inválida!";

 }

}


?>

<!DOCTYPE html>
<html lang="pt-br">
<body>

<form method="POST" action=""> 

     <label>Primeiro número</label><br>
     <input type="number" step="any" name="n1" required><br><br>

     <label>Escolha a Operação:</label><br>
     <input type="radio" id="soma" name="op" value="soma" checked>
     <label for="soma">Soma (+)</label><br>

     <input type="radio" id="sub" name="op" value="subtracao">
     <label for="sub">Subtração (-)</label><br>

     <input type="radio" id="mult" name="op" value="multiplicacao">
     <label for="mult">Multiplicação (*)</label><br>

     <input type="radio" id="div" name="op" value="divisao">
     <label for="div">Divisão (/)</label><br><br>

     <label>Segundo número</label><br>
     <input type="number" step="any" name="n2" required><br><br>

     <input type="submit" value="Calcular">

</form>

 <hr>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	echo "O resultado é: " . $resultado;
}

?>

</body>
</html>

