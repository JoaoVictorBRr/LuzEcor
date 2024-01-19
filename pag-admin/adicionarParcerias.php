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



include __DIR__ . "/LogicaPhp/adicionarParcerias.php"

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles-admin/global.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="shortcut icon" href="../ImagensSite-LuzeCor/Luz e cor.png" type="image/x-icon" />
    <title>Adicionar Parcerias - Admin</title>
</head>
<body>

    
    <header>
        <div class="categorias">
        <a href="./adicionarInformacao.php">INFORMAÇÕES DE CONTATO </a>
                    <p class="separadorMenu">|</p>
                    <a href="./adicionarDecoracoes.php">ADICIONAR DECORAÇÕES  </a>
                    <p class="separadorMenu">|</p>
                    <a href="./adicionarParcerias.php">ADICIONAR PARCERIAS </a>
                    <p class="separadorMenu">|</p>
                    <a href="./verDecoracoes.php">EDITAR DECORACÇÕES</a>
                    <p class="separadorMenu">|</p>
                    <a href="./verParcerias.php">EDITAR PARCERIAS</a>
                    <p class="separadorMenu">|</p>
                    <a href="?logout"><i class="bi bi-box-arrow-left"></i></a>
        </div>
    </header>
    
    <section class="form">

       

        <form method="POST" enctype="multipart/form-data">
            <h2>ADICIONAR PARCERIAS</h2>
        <div class="inputs_container">
            <div class="inputs">
                <br>
                <label class="labels" for="Nome">Nome </label>
                <input class="input-item" name="Nome" type="text">
            </div>

            <div class="inputs">
            <br>
                <label class="labels" for="Local">Local</label>
                <input class="input-item" name="Local" type="text">
            </div>

            <div class="inputs">
            <br>
                <label class="labels" for="horario">Horário</label>
                <input class="input-item" name="horario" type="text">
            </div>

            <div class="inputs">
            <br>
                <label class="labels" for="Whatsapp">Whatsapp </label>
                <input class="input-item" name="Whatsapp" type="number">
            </div>

            <div class="input_foto">
            <br>
                <label  class="label-arquivo" for="foto"> <strong> Adicionar foto </strong></label>
                <input class="input-item arquivo" name="foto" type="file" required>
            </div>
        </div>
          
        
               
        <div class="button">
            <input class="button-item" class="button" name="cadastro" type="submit" value="Adicionar">
        </div> 

        </form>
       

    </section>


</body>
</html>