<?php

session_start();

if(!isset($_SESSION['login'])){  
    include('login.php');
    exit;
 }else if(isset($_GET['logout'])){
    unset($_SESSION['login']);
    session_destroy();
    header('Location: login.php');
 }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles-admin/global.css">
    <link rel="stylesheet" href="./styles-admin/adicionarAdmin.css">

    <link rel="shortcut icon" href="../ImagensSite-LuzeCor/Luz e cor.png" type="image/x-icon" />
    <title>Iformações de contato - Admin</title>
</head>
<body>

    
    <header>
        <div class="categorias">
        <a href="./adicionarInformacao.php"><strong>Informações de contato</strong></a>
                    <a href="./adicionarDecoracoes.php"><strong>Adicionar Decorações</strong></a>
                    <a href="./adicionarParcerias.php"><strong>Adicionar Parcerias</strong></a>
                    <a href="./verDecoracoes.php"><strong>Editar Decoraçoes</strong></a>
                    <a href="./verParcerias.php"><strong>Editar Parcerias</strong></a>
                    <a href="?logout"><strong>LogOut</strong></a>
        </div>
    </header>
    <br>
    <br>
    <br>
    <section><h1>Estamos trabalhando...</h1></section>


</body>
</html>