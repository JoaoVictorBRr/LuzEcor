<?php

    require "./src/conection.php";
    require "./src/Model/parceria.php";
    require "./src/repository/repositorioParceria.php";

    $parceriaRepositorio = new parceriaRepositorio($pdo);
    $dadosParceria = $parceriaRepositorio->listaParceria(); 

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luz e Cor - Parceria</title>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/pags/parceria.css">
    <link rel="shortcut icon" href="./ImagensSite-LuzeCor/Luz e cor.png" type="image/x-icon" />
</head>
<body>
<header>
    <a href="/">  <img class="logo_LuzECor" src="./ImagensSite-LuzeCor/Luz e cor.png" alt="Logo"> </a>
    <a class="menu" href="/">HOME</a>
    <a class="menu" href="/decoracoes.php">DECORAÇÕES</a>
    <a class="menu" href="/parceria.php">PARCERIA</a>
    <a class="menu" href="/contato.php">CONTATO</a>
    <a href="">  <img class="logo_Whats" src="./ImagensSite-LuzeCor/Fotos/Whats.png" alt="LogoWhats" > </a>
</header>


<h1>Buffets parceiros</h1>

<section class="container_parceiros">
    <?php foreach ($dadosParceria as $parceria): ?>
        <div class="parceriro_div">
        
                <img class="imgParcerio" src="<?php echo "./ImagensSite-LuzeCor/Fotos/Buffet/" . $parceria->getFilePath() ?>" alt="<?php $parceria->getFilePath()?>">
                <div class="parceriro_content">
                    <div>
                        <p>Nome: <?php echo $parceria->getNome() ?></p>
                        <p>Local: <?php echo $parceria->getLocalizacao() ?></p>
                        <p>Celular: <?php echo $parceria->getCelular() ?></p>
                        <p>Horário: <?php echo $parceria->getHorario() ?></p>
                    </div>
                    <a class="button_contact" href="">Entrar em contato</a>
                </div>
               
        
        </div>
    <?php endforeach; ?>
</section>
<footer>

    <a href="">  <img class="Logo_footer"   src="./ImagensSite-LuzeCor/Luz e cor.png" alt="Logo"> </a>
    <div class="contato_footer">
    <h3>Contato</h3>
    <div class="contato_footer_numero">
    <a href="">  <img class="iconWhats_footer" src="./ImagensSite-LuzeCor/Fotos/Whats.png" alt="LogoWhats" > </a>
    <p><strong>(19) 99601-7447</strong></p>
    </div>
    </div>
    <div class="redes_footer">
        <h3>Redes sociais</h3>
        <div class="redes_footer_icons">
        <a href=""> <img class="iconFacebook_footer" src="./ImagensSite-LuzeCor/Fotos/FAce.png" alt="iconFacebook_footer"></a>
        <a href=""> <img class="iconInstagram_footer" src="./ImagensSite-LuzeCor/Fotos/Insta.png" alt="iconInstagram_footer"></a>
        </div>
    </div>
</footer>
</body>
</html>