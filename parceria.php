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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="./ImagensSite-LuzeCor/Luz e cor.png" type="image/x-icon" />
    <script src="script.js"></script>
</head>
<body>
<header>
    <a href="/">  <img class="logo_LuzECor" src="./ImagensSite-LuzeCor/Luz e cor.png" alt="Logo"> </a>
    <a class="menu" href="/">HOME</a>
    <a class="menu" href="/decoracoes.php">DECORAÇÕES</a>
    <a class="menu" href="/parceria.php">PARCERIA</a>
    <a class="menu" href="/contato.php">CONTATO</a>
    <a class="menu" href="/sobre.php">SOBRE</a>
    <a href="https://wa.me/5519996017447?text=Olá,%20gostaria%20de%20uma%20festa!!">  <img class="logo_Whats" src="./ImagensSite-LuzeCor/Fotos/Whats.png" alt="LogoWhats" > </a>
</header>

<nav class="menu-lateral-container" >

    <div class="menu-botao">
        <a href="/">  <img class="logo_LuzECor" src="./ImagensSite-LuzeCor/Luz e cor.png" alt="Logo"> </a> 

        <div class="btn-lateral">
                <i class="btn-lateral bi bi-list" onclick="abrirMenu()"></i>
        </div>
    </div>

    <div class="menu-lateral-itens" id="menu-lateral">

        <ul>

            <div class="item-menu">
                 <i class="bi bi-arrow-left" onclick="fecharMenu()"></i>
            </div>

            <div class="item-menu">
                <a class="menu" href="/">
                <span class="icon"><i class="bi bi-house"></i></span>
                <span class="txt-link">HOME</span>
                </a>
            </div>

            <div class="item-menu">
                <a class="menu" href="/decoracoes.php">
                <span class="icon"><i class="bi bi-balloon-heart"></i></span>
                <span class="txt-link">DECORAÇÕES</span>
                </a>
            </div>

            <div class="item-menu">
                <a class="menu" href="/parceria.php">
                <span class="icon"><i class="bi bi-people-fill"></i></span>
                <span class="txt-link">PARCERIA</span>
                </a>
            </div>

            <div class="item-menu">
                <a class="menu" href="/contato.php">
                <span class="icon"><i class="bi bi-envelope"></i></span>
                <span class="txt-link">CONTATO</span>
                </a>
            </div>

            <div class="item-menu">
                <a class="menu" href="https://wa.me/5519996017447?text=Olá,%20gostaria%20de%20uma%20festa!!">
                <span class="icon"><i class="bi bi-whatsapp"></i></span>
                <span class="txt-link">WHATSAPP</span>
                </a> 
            </div>

            <div class="item-menu">
                <a class="menu" href="/sobre.php">
                <span class="icon"><i class="bi bi-person-heart"></i></span>
                <span class="txt-link">SOBRE</span>
                </a> 
            </div>
        </ul>

    </div>

</nav>



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
                    <a class="button_contact" href="https://api.whatsapp.com/send/?phone=<?php echo $parceria->getCelular() ?>&text=Olá%2C+gostaria+de+uma+festa%21%21&type=phone_number&app_absent=0">Entrar em contato</a>
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