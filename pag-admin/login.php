<?php

require __DIR__ . "../../src/conection.php";

require __DIR__ . "/src-admin/Model-admin/usuario.php";
require __DIR__ . "/src-admin/repository-admin/repositorioUser.php";

$usuarioRepositorio = new UsuarioRepositorio($pdo);

if(isset($_POST['cadastro'])){ 
    if($usuarioRepositorio->getUsuario() == $_POST['user'] && $usuarioRepositorio->getSenha() == $_POST['senha'] ){
       $_SESSION['login'] = true;
       header('Location: adicionarDecoracoes.php');
    }else{
        echo "<script>alert('Senha ou usário errado, tente novamente');</script>";
    }
}
  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles-admin/global.css">
    <link rel="stylesheet" href="./styles-admin/login.css">

    <link rel="shortcut icon" href="../ImagensSite-LuzeCor/Luz e cor.png" type="image/x-icon" />
    <title>Iformações de contato - Admin</title>
</head>
<body>

    <section class="form">

        <form method="POST" id="form">
            <h2>Login</h2>
            <br>
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
            <input id="entrar" class="button-item" class="button" name="cadastro" type="submit" value="Entrar">
        </div> 
        </form>

    </section>

</body>
</html>