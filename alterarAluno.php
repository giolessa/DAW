<?php
$msg = "";
$aluno = ["", "", ""]; 

if (isset($_POST['botaoBuscar'])) {
    $mat = $_POST["matricula"];
    $arq = fopen("alunos.csv", "r") or die("erro ao abrir");
    while (($dados = fgetcsv($arq, 0, ";")) !== FALSE) {
        if ($dados[0] == $mat) {
            $aluno = $dados;
            $msg = "aluno encontrado!";
            break;
        }
    }
    fclose($arq);
    if ($aluno[0] == "") $msg = "aluno não encontrado!";
}

if (isset($_POST['botaoAlterar'])) {
    $mat = $_POST["matricula"];
    $nome = $_POST["nome"];
    $mail = $_POST["email"];
    $temp = [];
    
    $arq = fopen("alunos.csv", "r") or die("erro na leitura");
    while (($dados = fgetcsv($arq, 0, ";")) !== FALSE) {
        if ($dados[0] == $mat) {
            $temp[] = $mat . ";" . $nome . ";" . $mail . "\n";
        } else {
            $temp[] = $dados[0] . ";" . $dados[1] . ";" . $dados[2] . "\n";
        }
    }
    fclose($arq);

    $arq = fopen("alunos.csv", "w") or die("erro na escrita");
    foreach ($temp as $linha) {
        fwrite($arq, $linha);
    }
    fclose($arq);
    $msg = "Alterado com sucesso!";
}
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"></head>
<body>
    <h1>Alterar Aluno</h1>
    <form method="POST">
        Matrícula: <input type="text" name="matricula" value="<?php echo $aluno[0]; ?>">
        <input type="submit" name="botaoBuscar" value="Buscar">
    </form>
    <hr>
    <form method="POST">
        <input type="hidden" name="matricula" value="<?php echo $aluno[0]; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $aluno[1]; ?>"><br><br>
        E-mail: <input type="text" name="email" value="<?php echo $aluno[2]; ?>"><br><br>
        <input type="submit" name="botaoAlterar" value="Confirmar Alteração" <?php if($aluno[0]=="") echo "disabled"; ?>>
    </form>
    <p><strong><?php echo $msg; ?></strong></p>
</body>
</html>
