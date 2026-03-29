<<<<<<< HEAD
<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matricula = $_POST["matricula"];
    $nome      = $_POST["nome"];
    $email     = $_POST["email"];

    if (!file_exists("alunos.txt")) {
        $arq = fopen("alunos.txt", "w");
        fwrite($arq, "matricula;nome;email\n");
        fclose($arq);
    }

    $arq = fopen("alunos.txt", "a");
    $linha = $matricula . ";" . $nome . ";" . $email . "\n";
    fwrite($arq, $linha);
    fclose($arq);

    $msg = "Aluno $nome cadastrado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Incluir Aluno</title>
</head>
<body>
    <h1>Criar Novo Aluno</h1>
    
    <form action="" method="POST">
        Matrícula: <input type="text" name="matricula" required>
        <br><br>
        Nome: <input type="text" name="nome" required>
        <br><br>
        E-mail: <input type="email" name="email" required>
        <br><br>
        <input type="submit" value="Incluir Aluno">
    </form>

    <p><strong><?php echo $msg; ?></strong></p>
</body>
</html>
=======
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
>>>>>>> 05c55909ba6ce798f6bbdd17e16f0dc447acce00
