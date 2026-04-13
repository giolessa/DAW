
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
