<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];
    $carga = $_POST["carga"];
    $msg = "";

    echo "Nome matéria: " . $nome . "<br>";
    echo "Sigla matéria: " . $sigla . "<br>";
    echo "Carga Horária: " . $carga . "H" . "<br>";


   if (!file_exists("disciplina.txt")) {
       $arqDiscip = fopen("disciplina.txt","w") or die("Não consegui criar o arquivo");
       $linha = "nome;sigla;carga\n";
       fwrite($arqDiscip,$linha);
       fclose($arqDiscip);
   }

   $arqDisciplina = fopen("disciplina.txt","a") or die("Não consegui criar o arquivo");
    $linha = $nome . ";" . $sigla . ";" . $carga . "\n";
    fwrite($arqDiscip,$linha);
    fclose($arqDiscip;
    $msg = "!!Concluido com sucesso!!";
}

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
  
<h1>Adicionar Nova Disciplina</h1>
  
<form action="adicionarDisciplina.php" method="POST">
    Nome da Disciplina: <input type="text" name="nome" required>
    <br><br>
    Sigla da Disciplina: <input type="text" name="sigla" required>
    <br><br>
    Carga Horaria: <input type="text" name="carga" required>
    <br><br>
    <input type="submit" value="Criar Nova Disciplina">
</form>
  
<p><?php echo $msg ?></p>
  
<br>
</body>
</html>
