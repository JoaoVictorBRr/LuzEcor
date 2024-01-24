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
    <script src="./script/menuLateral.js" defer></script>
    <title>Adicionar Parcerias - Admin</title>
</head>
<body>

    
    <header>
        <div class="categorias">
        <a href="./adicionarInformacao.php">INFORMAÇÕES DE CONTATO </a>
                    <a href="./adicionarDecoracoes.php">ADICIONAR DECORAÇÕES  </a>
                    <a href="./adicionarParcerias.php">ADICIONAR PARCERIAS </a>
                    <a href="./verDecoracoes.php">EDITAR DECORACÇÕES</a>
                    <a href="./verParcerias.php">EDITAR PARCERIAS</a>
                    <a href="?logout"><i class="bi bi-box-arrow-left"></i></a>
        </div>
    </header>

     <nav>

        <div class="btn_ativa_menu_lateral"><i class="btn-lateral bi bi-list" onclick="abrirMenu()"></i></div>

        <div class="categorias_barra_lateral" id="categorias_barra_lateral">

                        <i class="bi bi-arrow-left" onclick="fecharMenu()"></i>
                        <a href="./adicionarInformacao.php"><i class="bi bi-person"></i> INFORMAÇÕES DE CONTATO </a>
                        <a href="./adicionarDecoracoes.php"><i class="bi bi-balloon-heart"></i> ADICIONAR DECORAÇÕES  </a>
                        <a href="./adicionarParcerias.php"><i class="bi bi-people-fill"></i> ADICIONAR PARCERIAS </a>
                        <a href="./verDecoracoes.php"><i class="bi bi-pen"></i> EDITAR DECORACÇÕES</a>
                        <a href="./verParcerias.php"><i class="bi bi-pen"></i> EDITAR PARCERIAS</a>
                        <a href="?logout"><i class="bi bi-box-arrow-left"></i></a>
                        
        </div>

    </nav>
    
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
                <input id="local" class="input-item" name="Local" type="text">
            </div>

            <div class="inputs">
            <br>
                <label class="labels" for="horario">Horário</label>
                <input id="hora" class="input-item" name="horario" type="text">
            </div>

            <div class="inputs">
            <br>
                <label class="labels" for="Whatsapp">Whatsapp </label>
                <input id="phone" class="input-item" name="Whatsapp" type="text">
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

    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/jquery-mask-plugin/dist/jquery.mask.js"></script>
    <script src="../../node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>

    <script >

        $(document).ready(function(){
            $('#phone').mask('(00) 00000-0000');
            $('#hora').mask('00:00 até 00:00');

        })

    </script>

</body>
</html>