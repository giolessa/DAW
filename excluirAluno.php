<?php
$msg = "";
$aluno = ["", "", ""]; 

if (isset($_POST['botaoBuscar'])) {
    $mat = $_POST["matricula"];
    if (file_exists("alunos.csv")) {
        $arq = fopen("alunos.csv", "r") or die("Erro ao abrir arquivo");
        while (($dados = fgetcsv($arq, 0, ";")) !== FALSE) {
            if ($dados[0] == $mat) {
                $aluno = $dados;
                $msg = "Aluno encontrado! Deseja realmente excluir?";
                break;
            }
        }
        fclose($arq);
    }
    if ($aluno[0] == "") $msg = "Aluno não encontrado!";
}

// LÓGICA DE EXCLUSÃO
if (isset($_POST['botaoExcluir'])) {
    $mat = $_POST["matricula"];
    $temp = [];
    
    $arq = fopen("alunos.csv", "r") or die("Erro na leitura");
    while (($dados = fgetcsv($arq, 0, ";")) !== FALSE) {
        // Se a matrícula for DIFERENTE da que queremos apagar, guardamos no array
        if ($dados[0] != $mat) {
            $temp[] = $dados[0] . ";" . $dados[1] . ";" . $dados[2] . "\n";
        }
    }
    fclose($arq);

    // Sobrescreve o arquivo com a lista filtrada (sem o aluno excluído)
    $arq = fopen("alunos.csv", "w") or die("Erro na escrita");
    foreach ($temp as $linha) {
        fwrite($arq, $linha);
    }
    fclose($arq);
    $msg = "Aluno removido com sucesso!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Excluir Aluno</title>
</head>
<body>
    <h1>Excluir Aluno</h1>
    
    <form method="POST">
        Matrícula para excluir: 
        <input type="text" name="matricula" value="<?php echo $aluno[0]; ?>">
        <input type="submit" name="botaoBuscar" value="Buscar">
    </form>
    
    <hr>

    <?php if ($aluno[0] != ""): ?>
        <form method="POST">
            <p><strong>Dados do Aluno:</strong></p>
            <p>Nome: <?php echo $aluno[1]; ?></p>
            <p>E-mail: <?php echo $aluno[2]; ?></p>
            
            <input type="hidden" name="matricula" value="<?php echo $aluno[0]; ?>">
            <input type="submit" name="botaoExcluir" value="Confirmar Exclusão" style="color: red;">
            <a href="excluirAluno.php">Cancelar</a>
        </form>
    <?php endif; ?>

    <p><strong><?php echo $msg; ?></strong></p>
    <br>
    <a href="incluirAluno.php">Voltar para Cadastro</a>
</body>
</html>