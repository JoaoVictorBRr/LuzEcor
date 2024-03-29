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
    <title>Luz e Cor - Contato</title>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/pags/contato.css">
    <link rel="shortcut icon" href="./ImagensSite-LuzeCor/Luz e cor.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

<section class="banner_01">
    <div class="main_content_banner_01">
        <div class="text_banner_01">
            <h1>Vamos começar a planejar?</h1>
            <div>
            <p>Entre em contato por</p>
            <p>Whatsapp ou Instagram!</p>
            </div>
        </div>
        <div class="buttons_redesSocias">  
         
            <a class="button" href="https://wa.me/5519996017447?text=Olá,%20gostaria%20de%20uma%20festa!!"><img class="imgRedeSocial" src="./ImagensSite-LuzeCor/Fotos/WhatsWhite.png" alt="" >19-996017447</a>
        
            <a class="button" href="https://www.instagram.com/luz_e_cor_festas/"><img class="imgRedeSocial" src="./ImagensSite-LuzeCor/Fotos/InstaWhite.png" alt="" >luz_e_cor_festas</a>
        </div>
    </div>
    <img class="criancaMenina" src="./ImagensSite-LuzeCor/Fotos/Criança4.png" align="right" alt="">
</section>

<h3 class="text_comments">Veja o que os clientes falam sobre nós!!!</h3>

<section class="card_container">

        <div class="card_Content">

            <div class="people_card">
                <img  src="./ImagensSite-LuzeCor/Fotos/pessoas/1.png " alt="">
                <h3>Julia</h3>
            </div>
            <div>
                <img  class="estrelas" src="./ImagensSite-LuzeCor/Fotos/Estrelas/4.png" alt="">
            </div>
            <div class="description">
                <p>Gostei muito da decoração que a empresa fez para o aniversário da minha filha, as crianças também adoraram. No próximo aniversário dela, já sei com quem falar.</p>
            </div>
        </div>


            <div class="card_Content">

                <div class="people_card">
                <img  src="./ImagensSite-LuzeCor/Fotos/pessoas/2.png " alt="">
                <h3>Ricardo</h3>
                </div>
                <div>
                <img  class="estrelas" src="./ImagensSite-LuzeCor/Fotos/Estrelas/4.png" alt="">
                </div>
                <div class="description">
                    <p>Estava procurando alguém para fazer a decoração da festa do meu casamento. Entrei em contato com a empresa, e eles garantiram que conseguiriam fazer. A decoração ficou incrível, a empresa está de parabéns!</p>
                </div>
            </div>
            <div class="card_Content">

                <div class="people_card">
                    <img  src="./ImagensSite-LuzeCor/Fotos/pessoas/3.png " alt="">
                    <h3>Simone</h3>
                </div>
                <div>
                    <img  class="estrelas" src="./ImagensSite-LuzeCor/Fotos/Estrelas/5.png" alt="">
                </div>
                <div class="description">
                    <p>O atendimento foi excelente, e a decoração ficou incrível! Fiquei apaixonada pela decoração do Batman que ela fez para o meu filho. Super recomendo que entrem em contato com a empresa!</p>
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