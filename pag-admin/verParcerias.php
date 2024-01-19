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

    <link rel="shortcut icon" href="../ImagensSite-LuzeCor/Luz e cor.png" type="image/x-icon" />
    <title>Ver Parcerias - Admin</title>
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
                
            <div>
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14723.269476910966!2d-47.64496762320311!3d-22.697841630701475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1700010459675!5m2!1spt-BR!2sbr" width="350" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            </div>
        <?php endforeach; ?>
    </section>
    
    



</body>
</html>