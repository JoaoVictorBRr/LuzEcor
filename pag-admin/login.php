<?php

require __DIR__ . "../../src/conection.php";

require __DIR__ . "/src-admin/Model-admin/usuario.php";
require __DIR__ . "/src-admin/repository-admin/repositorioUser.php";

$usuarioRepositorio = new UsuarioRepositorio($pdo);

if(isset($_POST['cadastro'])){

    
    if($usuarioRepositorio->getUsuario() == $_POST['user'] && $usuarioRepositorio->getSenha() == $_POST['senha'] ){
        header("Location: ./adicionarInformacao.php");
    }
  
    
}
  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="./styles-admin/login.css">

    <link rel="shortcut icon" href="../ImagensSite-LuzeCor/Luz e cor.png" type="image/x-icon" />
    <title>Iformações de contato - Admin</title>
</head>
<body>

    <section class="form">

        <form method="POST">
            <h2>Login</h2>

            <div class="inputs">
                <label for="user">Usuário: </label>
                <input class="input-item" name="user" type="text">
            </div>

            <div class="inputs">
                <br>
                <label for="senha">Senha: </label>
                <input class="input-item" name="senha" type="password">
            </div>
            
        <div class="button">
            <input class="button-item" class="button" name="cadastro" type="submit" value="Entrar">
        </div> 
        </form>

    </section>

</body>
</html>