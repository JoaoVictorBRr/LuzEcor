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

require __DIR__ . "../../src/Model/parceria.php";
require __DIR__ . "../../src/repository/repositorioParceria.php";

$parceriaRepositorio = new parceriaRepositorio($pdo);
$dadosParceria = $parceriaRepositorio->listaParceria();


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles-admin/global.css">
    <link rel="stylesheet" href="./styles-admin/adicionarAdmin.css">
    <link rel="stylesheet" href="./styles-admin/verParceria.css">

    <link rel="shortcut icon" href="../ImagensSite-LuzeCor/Luz e cor.png" type="image/x-icon" />
    <title>Ver Parcerias - Admin</title>
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
                        <a class="button_contact" href="./EditarParcerias.php?<?php echo $parceria->getId() ?>">Editar contato</a>
                    </div>
                
            <div>
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14723.269476910966!2d-47.64496762320311!3d-22.697841630701475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1700010459675!5m2!1spt-BR!2sbr" width="350" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            </div>
        <?php endforeach; ?>
    </section>
    
    



</body>
</html>