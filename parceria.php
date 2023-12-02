<?php

    require "./src/conection.php";
    require "./src/Model/parceria.php";
    require "./src/repository/repositorioParceria.php";

    require "./pag-admin/src-admin/Model-admin/informacao.php";
    require "./pag-admin/src-admin/repository-admin/repositorioInformacao.php";

    $parceriaRepositorio = new parceriaRepositorio($pdo);
    $informacaoRepositorio = new InformacaoRepositorio($pdo);
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
    <a href="https://wa.me/5519996017447?text=Olá,%20gostaria%20de%20uma%20festa!!">  <img class="logo_Whats" src="./ImagensSite-LuzeCor/Fotos/Whats.png" alt="LogoWhats" > </a>
</header>


<div class="botao_whatsapp">
        <a href="https://wa.me/5519996017447?text=Olá,%20gostaria%20de%20uma%20festa!!"><img src="./ImagensSite-LuzeCor/WhatsApp-Logo.png" alt="WhatsApp Logo"></a>
</div>

<h1>Buffets parceiros</h1>

<section class="container_parceiros">
    <?php foreach ($dadosParceria as $parceria): ?>
        <div class="parceriro_div">
        
                <img class="imgParcerio" src="<?php echo "./pag-admin/imagensBancoParceria/" . $parceria->getFilePath() ?>" alt="<?php $parceria->getFilePath()?>">
                <div class="parceriro_content">
                    <div>
                        <p>Nome: <?php echo $parceria->getNome() ?></p>
                        <p>Local: <?php echo $parceria->getLocalizacao() ?></p>
                        <p>Celular: <?php echo $parceria->getCelular() ?></p>
                        <p>Horário: <?php echo $parceria->getHorario() ?></p>
                    </div>
                    <a class="button_contact" href="">Entrar em contato</a>
                </div>
               
        <div>
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14723.269476910966!2d-47.64496762320311!3d-22.697841630701475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1700010459675!5m2!1spt-BR!2sbr" width="350" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        </div>
    <?php endforeach; ?>
</section>
<footer>

<a href="./index.php">  <img class="Logo_footer"   src="./ImagensSite-LuzeCor/Luz e cor.png" alt="Logo"> </a>
<div class="contato_footer">
<h3>Contato</h3> 
<div class="contato_footer_numero">
<a href="https://wa.me/<?php echo $informacaoRepositorio->getTelefone()?>?text=Olá,%20gostaria%20de%20uma%20festa!!">  <img class="iconWhats_footer" src="./ImagensSite-LuzeCor/Fotos/Whats.png" alt="LogoWhats" > </a> 
<p><strong><?php echo $informacaoRepositorio->getTelefone()?></strong></p>
</div>
</div>
<div class="redes_footer">
    <h3>Redes sociais</h3> 
    <div class="redes_footer_icons">
    <a href="<?php echo $informacaoRepositorio->getFacebook() ?>"> <img class="iconFacebook_footer" src="./ImagensSite-LuzeCor/Fotos/FAce.png" alt=""></a>
    <a href="<?php echo $informacaoRepositorio->getInstagram() ?>"> <img class="iconInstagram_footer" src="./ImagensSite-LuzeCor/Fotos/Insta.png" alt=""></a>
    </div>
</div>
</footer>
</body>
</html>