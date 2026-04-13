<?php
$msg = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    if(!file_exists("usuarios.txt")) {
        $arq = fopen("usuarios.txt", "w");
        fwrite($arq, "id;usuario;email;senha\n");
        fclose($arq);
    }

    $arq = fopen("usuarios.txt", "a");
    $linha = $id . ";" . $usuario . ";" . $email . ";" . $senha . "\n";
    fwrite($arq, $linha);
    fclose($arq);

    $msg = "Usuário cadastado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
</head>
<body>
    <h1>Cadastre-se</h1>
    <form action="criarUsuario.php" method="POST">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id" required>
        <br><br>
        <label for="usuario">Usuário:</label><br>
        <input type="text" id="usuario" name="usuario" required>
        <br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required>
        <br><br>
        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>

        <input type="submit" value="Cadastrar"> 

    </form>
    
    <?php echo $msg; ?>
</body>
</html>
