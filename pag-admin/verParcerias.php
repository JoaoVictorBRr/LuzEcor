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


include __DIR__ . "/LogicaPhp/verParcerias.php";


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles-admin/global.css">
    <link rel="stylesheet" href="./styles-admin/verParceria.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="./script/menuLateral.js" defer></script>
    <link rel="shortcut icon" href="../ImagensSite-LuzeCor/Luz e cor.png" type="image/x-icon" />
    <title>Ver Parcerias - Admin</title>
</head>
<body>

    
    <header>
        <div class="categorias">
                    <a href="./adicionarInformacao.php">INFORMAÇÕES DE CONTATO </a>
                    <a href="./adicionarDecoracoes.php">ADICIONAR DECORAÇÕES  </a>
                    <a href="./adicionarParcerias.php">ADICIONAR PARCERIAS </a>
                    <a href="./verDecoracoes.php">EDITAR DECORAÇÕES</a>
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

    <section class="container_parceiros">
        <?php foreach ($dadosParceria as $parceria): ?>
            <div class="parceriro_div">
            
                    <img class="imgParcerio" src="<?php echo "./imagensBancoParceria/" . $parceria->getFilePath() ?>" alt="<?php $parceria->getFilePath()?>">
                    <div class="parceriro_content">
                        <div>
                            <p>Nome: <?php echo $parceria->getNome() ?></p>
                            <p>Local: <?php echo $parceria->getLocalizacao() ?></p>
                            <p>Celular: <?php echo $parceria->getCelular() ?></p>
                            <p>Horário: <?php echo $parceria->getHorario() ?></p>
                        </div>
                        <a class="button_contact" href="./EditarParcerias.php?id=<?php echo $parceria->getId() ?>">Editar contato</a>
                    </div>
    
            </div>
        <?php endforeach; ?>
    </section>
    
    



</body>
</html>