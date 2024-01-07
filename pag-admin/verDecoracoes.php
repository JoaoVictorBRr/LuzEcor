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



    require __DIR__ . "../../src/conection.php";
    require __DIR__ . "../../src/Model/decoracao.php";
    require __DIR__ . "../../src/repository/repositorioDecoracao.php";


    require __DIR__ . "/src-admin/Model-admin/informacao.php";
    require __DIR__ . "/src-admin/repository-admin/repositorioInformacao.php";

    $decoracaoRepositorio = new DecoracaoRepositorio($pdo);
    $dadosDecoracao = $decoracaoRepositorio->listaDecoracao();

    $informacaoRepositorio = new InformacaoRepositorio($pdo);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles-admin/global.css">
    <link rel="stylesheet" href="./styles-admin/adicionarAdmin.css">
    <link rel="stylesheet" href="./styles-admin/verDecoracoes.css">
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



    <section class="destacados_container">
    <div class="categorias_content">
        <?php foreach($dadosDecoracao as $decoracaoDestacada): ?>
            <a class="ancorDecoracao" href="<?php echo "./produto.php?id=" . $decoracaoDestacada->getId() ?>">   
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