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
     <input type="text" name="n1"><br><br>

     <label>Operação</label><br>
     <input type="text" name="op"><br><br>

     <label>Segundo número</label><br>
     <input type="text" name="n2"><br><br>

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

