<?php 

    require "./src/conection.php";
    require "./src/Model/decoracao.php";
    require "./src/repository/repositorioDecoracao.php";


    require "./pag-admin/src-admin/Model-admin/informacao.php";
    require "./pag-admin/src-admin/repository-admin/repositorioInformacao.php";

    $decoracaoRepositorio = new DecoracaoRepositorio($pdo);
    $dadosDecoracao = $decoracaoRepositorio->listaDecoracao();

    $informacaoRepositorio = new InformacaoRepositorio($pdo);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./ImagensSite-LuzeCor/Luz e cor.png" type="image/x-icon" />
    <link rel="stylesheet" href="./styles/pags/decoracoes.css">
    <link rel="stylesheet" href="./styles/global.css">
    
    <title>Luz e Cor - Decoracoes</title>
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

<section class="banner_01">
    <div class="main_content_banner_01"> 
      
        <div class="texto_banner_01">
            <h2>Celebre como um verdadeiro herói ou princesa! </h2>
            <div>
                <p>Trazemos à vida ao mundo encantado dos</p>
                <p>personagens favoritos das crianças.</p>
            </div>
            <h2>Veja as festas mágicas que já criamos!</h2>

        </div>
        <img class="duasCriancas" src="./ImagensSite-LuzeCor/Fotos/Criança6_Nuvem.png" alt="Criança3_Nuvem">
    </div>
</section>


<section class="destacados_container">
    <h2 class="titulos_categorias">Destacados</h2>
    <div class="categorias_content">
        <?php foreach($dadosDecoracao as $decoracaoDestacada):

            //Comando para destacar apenas as decorações em alta
            if($decoracaoDestacada->getHighlighted() == 0){
                continue;
            }
         
        ?>
            <a class="ancorDecoracao" href="<?php echo "./produto.php?id=" . $decoracaoDestacada->getId() ?>">   
                <div class="cardDecoracao" >
                    <img src=" <?php echo "./pag-admin/imagensBanco/" . $decoracaoDestacada->getFilePath() ?>" class="imagemDecoracao" alt="<?php echo $decoracaoDestacada->getFilePath() ?>">
                    <div class="cardTextContent">
                        <h5 class="card-title-decoracao"><?php echo $decoracaoDestacada->getTitle() ?></h5>
                        <p class="card-text-decoracao"><?php echo $decoracaoDestacada->getSummary() ?></p>
                    </div>
                </div>
            </a> 
          
        <?php endforeach; ?>
    </div>
</section>

<section class="todas_container">
    <h2 class="titulos_categorias">Todas</h2>
    <div class="categorias_content">
    <?php foreach($dadosDecoracao as $decoracaoTodas):?>
        <a class="ancorDecoracao" href="<?php echo "./produto.php?id=" . $decoracaoTodas->getId() ?>">   
            <div class="cardDecoracao" >
                <img src=" <?php echo "./pag-admin/imagensBanco/" . $decoracaoTodas->getFilePath() ?>" class="imagemDecoracao" alt="<?php echo $decoracaoDestacada->getFilePath() ?>">
                <div class="cardTextContent">
                    <h5 class="card-title-decoracao"><?php echo $decoracaoTodas->getTitle() ?></h5>
                    <p class="card-text-decoracao"><?php echo $decoracaoTodas->getSummary() ?></p>
                </div>
             </div>
        </a> 
        <?php endforeach;?>
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