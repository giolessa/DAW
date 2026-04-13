<?php
$msg = "";
$aluno = ["", "", ""];
$arquivo_nome = "alunos.csv";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["buscar"])) {
    $mat = $_POST["matricula"];
    
    if (file_exists($arquivo_nome)) {
        $arquivo = fopen($arquivo_nome, "r");
        while (($dados = fgetcsv($arquivo, 0, ";")) !== FALSE) {
            if ($dados[0] == $mat) {
                $aluno = $dados;
                $msg = "Aluno encontrado!";
                break;
            }
        }
        fclose($arquivo);
    }
    
    if ($aluno[0] == "") {
        $msg = "Aluno não encontrado!";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["excluir"])) {
    $mat = $_POST["matricula"];
    $temp = [];
    $encontrado = false;

    if (file_exists($arquivo_nome)) {
        $arquivo = fopen($arquivo_nome, "r");
        while (($dados = fgetcsv($arquivo, 0, ";")) !== FALSE) {
            if ($dados[0] != $mat) {
                $temp[] = $dados; // Guarda o array completo
            } else {
                $encontrado = true;
            }
        }
        fclose($arquivo);

        if ($encontrado) {
            $arquivo = fopen($arquivo_nome, "w");
            foreach ($temp as $linha) {
                fputcsv($arquivo, $linha, ";"); 
            }
            fclose($arquivo);
            $msg = "Aluno excluído com sucesso!";
        } else {
            $msg = "Matrícula não encontrada para exclusão.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Aluno</title>
</head>
<body>
    <h2>Excluir Aluno</h2>

    <form method="POST">
        <label>Matrícula:</label>
        <input type="text" name="matricula" value="<?= $aluno[0] ?>" required>
        <button type="submit" name="buscar">Buscar</button>

        <hr>

        <p>Nome: <b><?= $aluno[1] ?></b></p>
        <p>E-mail: <b><?= $aluno[2] ?></b></p>

        <button type="submit" name="excluir" <?= $aluno[0] == "" ? "disabled" : "" ?>>
            Confirmar Exclusão
        </button>
    </form>

    <p><?= $msg ?></p>
    
    <br>
    <a href="incluirAluno.php">Voltar ao Cadastro</a>
</body>
</html>
