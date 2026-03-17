<?php

$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mat = $_POST["matricula"];
    $nome = $_POST["nome"];
    $mail = $_POST["email"];

    if (!file_exists("alunos.csv")) {
        $arq = fopen("alunos.csv", "w") or die("erro ao criar arquivo");
        $cabecalho = ["matricula", "nome", "email"];
        fputcsv($arq, $cabecalho, ";");
        fclose($arq);

    }


    $arq = fopen("alunos.csv", "a") or die("erro ao abrir arquivo");
    $linha = [$mat, $nome, $mail];
    fputcsv($arq, $linha, ";");
    fclose($arq);
  
    $msg = "Deu tudo certo!!!!!!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<h1>Criar Novo Aluno</h1>
<form action="incluirAluno.php" method="POST">
    Matrícula: <input type="text" name="matricula">
    <br><br>
    Nome: <input type="text" name="nome">
    <br><br>
    E-mail: <input type="text" name="email">
    <br><br>
    <input type="submit" value="Criar Novo Aluno">
</form>
<p><?php echo $msg ?></p>
</body>
</html>
