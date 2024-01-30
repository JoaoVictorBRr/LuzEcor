<?php

require "./src/conection.php";

require "./pag-admin/src-admin/Model-admin/informacao.php";
require "./pag-admin/src-admin/repository-admin/repositorioInformacao.php";

$informacaoRepositorio = new InformacaoRepositorio($pdo);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luz e Cor - Parceria</title>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/pags/sobre.css">
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

<section class="luzecor_descricao">
    <div class="luzecor_descricao_textoGeral_div">
        <div>
            <h1>Luz e Cor:</h1> 
            <h2>Fazemos decorações Mágicas </h2> 
        </div>
        <div class="luzecor_descricao_descricao_div">
            <p>Desde 2013, somos apaixonados em criar festas decorativas e dedicamos nossos esforços em transformar suas ideias em realidade.</p>
            <p>Com uma equipe talentosa e criativa, trazemos à vida os conceitos mais imaginativos e os transformamos em experiências visuais deslumbrantes.</p>
        </div>    
    </div>
    <img  class="img_decoracao" src="./ImagensSite-LuzeCor/Fotos/img_decoracao.jpg" alt="">
</section>

<section class="container_diretoras">

    <div class="div_diretora">
        <img class="img_diretoras" src="./ImagensSite-LuzeCor/diretoras/sandra.png" alt="">
        <div>
            <p class="nome">Sandra Gonçalves</p>
            <p class="descricao">Uma pessoa extremamente comunicativa, empreendedora e observadora.</p>
        </div>
    </div>

    <div class="div_diretora">
       
        <img class="img_diretoras" src="./ImagensSite-LuzeCor/diretoras/denise.png" alt="">
        <div>
            <p class="nome">Denise Tavares</p>
            <p class="descricao">Detalhista, com grande aptidão e conhecimento artístico.</p>
        </div>
    </div>

</section>

<section class="container_topicos">

    <div>
        <img class="img_sobre" src="./ImagensSite-LuzeCor/Fotos/sobre_1.png" alt="">
        <p>Trabalhamos com decorações desde 2013</p>
    </div>

    <div>
        <img class="img_sobre" src="./ImagensSite-LuzeCor/Fotos/sobre_2.png" alt="">
        <p>Somos dedicadas a criar momentos inesquecíveis para nossos clientes.</p>
    </div>

    <div>
        <img class="img_sobre" src="./ImagensSite-LuzeCor/Fotos/sobre_3.png" alt="">
        <p>Temos uma variedade de temas e projetos personalizados para você escolher</p>
    </div>
</section>




<section class="banner_02">
    <div class="main_content_banner_02"> 
        <div class="criancaMeninaApontando_div">
            <img class="criancaMeninaApontando" src="./ImagensSite-LuzeCor/Fotos/Criança7_Nuvem.png" alt="Criança3_Nuvem">
        </div>
        <div class="texto_banner_02">
            <h2>Ficou encantado(a) com o que viu? 😍</h2>
            <div>
            <p> Por que não entrar em contato</p>
            <p> agora e começar a</p>
            <p>planejar a festa dos sonhos?</p>
            </div>
            <a class="button_contact" href="/contato.php"><strong>ENTRE EM CONTATO AGORA!</strong></a>
        </div>
    </div>
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