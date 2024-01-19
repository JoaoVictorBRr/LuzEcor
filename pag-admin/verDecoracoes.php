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


include __DIR__ . "/LogicaPhp/verDecoracoes.php";

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles-admin/global.css">
    <link rel="stylesheet" href="./styles-admin/verDecoracoes.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="shortcut icon" href="../ImagensSite-LuzeCor/Luz e cor.png" type="image/x-icon" />
    <title>Ver Decorações - Admin</title>
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



    <section class="destacados_container">
    <div class="categorias_content">
        <?php foreach($dadosDecoracao as $decoracaoDestacada): ?>
            <a class="ancorDecoracao" href="<?php echo "./EditarProduto.php?id=" . $decoracaoDestacada->getId() ?>">   
                <div class="cardDecoracao" >
                    <img src=" <?php echo "./imagensBanco/" . $decoracaoDestacada->getFilePath() ?>" class="imagemDecoracao" alt="<?php echo $decoracaoDestacada->getFilePath() ?>">
                   
                    <div class="cardTextContent">
                        <h5 class="card-title-decoracao"><?php echo $decoracaoDestacada->getTitle() ?></h5>
                        <p class="card-text-decoracao"><?php echo $decoracaoDestacada->getSummary() ?></p>
                    </div>
                </div>
            </a> 
          
        <?php endforeach; ?>
    </div>
</section>

</body>
</html>