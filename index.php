<?php 

    require "./src/conection.php";
    require "./src/Model/decoracao.php";
    require "./src/Model/parceria.php";
    
    require "./pag-admin/src-admin/Model-admin/informacao.php";
    require "./pag-admin/src-admin/repository-admin/repositorioInformacao.php";

    require "./src/repository/repositorioDecoracao.php";
    require "./src/repository/repositorioParceria.php";

    $parceriaRepositorio = new parceriaRepositorio($pdo);
    $decoracaoRepositorio = new DecoracaoRepositorio($pdo);
    $informacaoRepositorio = new InformacaoRepositorio($pdo);

   

    $dadosDecoracao = $decoracaoRepositorio->listaDecoracao();
    $dadosParceria = $parceriaRepositorio->listaParceria(); 


    $maximoDeFotosParcerios = 0;
    $maximoDeFotosDecoracao = 0;
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luz e Cor - Home</title>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/pags/index.css">
    <link rel="shortcut icon" href="./ImagensSite-LuzeCor/Luz e cor.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<header>
    <a href="/">  <img class="logo_LuzECor" src="./ImagensSite-LuzeCor/Luz e cor.png" alt="Logo"> </a> 
    <a class="menu" href="/">HOME</a>
    <a class="menu" href="/decoracoes.php">DECORAÇÕES</a>
    <a class="menu" href="/parceria.php">PARCERIA</a>
    <a class="menu" href="/contato.php">CONTATO</a>
    <a href="https://wa.me/5519996017447?text=Olá,%20gostaria%20de%20uma%20festa!!">  <img class="logo_Whats" src="./ImagensSite-LuzeCor/Fotos/Whats.png" alt="LogoWhats" > </a> 
    <script src="script.js"></script>
</header>


<nav class="menu-lateral-container" >

    <a href="/">  <img class="logo_LuzECor" src="./ImagensSite-LuzeCor/Luz e cor.png" alt="Logo"> </a> 

    <div class="btn-lateral">
            <i class="bi bi-list" onclick="abrirMenu()"></i>
    </div>

    <div class="menu-lateral-itens" id="menu-lateral">

        <ul>

            <li class="item-menu">
                 <i class="bi bi-list" onclick="fecharMenu()"></i>
            </li>

            <li class="item-menu">
                <a class="menu" href="/"></a>
                <span class="icon"><i class="bi bi-house"></i></span>
                <span class="txt-link">HOME</span>
            </li>

            <li class="item-menu">
                <a class="menu" href="/decoracoes.php"></a>
                <span class="icon"><i class="bi bi-balloon-heart"></i></span>
                <span class="txt-link">DECORAÇÕES</span>
            </li>

            <li class="item-menu">
                <a class="menu" href="/parceria.php"></a>
                <span class="icon"><i class="bi bi-people-fill"></i></span>
                <span class="txt-link">PARCERIA</span>
            </li>

            <li class="item-menu">
                <a class="menu" href="/contato.php"></a>
                <span class="icon"><i class="bi bi-envelope"></i></span>
                <span class="txt-link">CONTATO</span>
            </li>

            <li class="item-menu">
                <a href="https://wa.me/5519996017447?text=Olá,%20gostaria%20de%20uma%20festa!!"> </a> 
                <span class="icon"><i class="bi bi-whatsapp"></i></span>
                <span class="txt-link">WHATSAPP</span>
            </li>
        </ul>

    </div>
  

   
  
    

</nav>

<div class="botao_whatsapp">
        <a href="https://wa.me/5519996017447?text=Olá,%20gostaria%20de%20uma%20festa!!"><img src="./ImagensSite-LuzeCor/WhatsApp-Logo.png" alt="WhatsApp Logo"></a>
</div>

<section class="banner_01">
    
    <div class="main_content_banner_01"> 
        <div class="criancaBalao_div">
            <img class="criancaBalao" src="./ImagensSite-LuzeCor/Fotos/Criança3_Nuvem.png" alt="Criança3_Nuvem">
        </div>
        <div class="texto_banner_01">
            <h2>Encante, surpreenda e celebre!</h2>
            <div>
            <p>Na nossa equipe, criamos as </p>
            <p>decorações de festa infantil mais</p>
            <p> mágicas e memoráveis.</p>
            </div>
            <a class="button_contact" href="/contato.php"><strong>ENTRE EM CONTATO AGORA!</strong></a>
        </div>
    </div>
</section>

<section class="banner_02">
    <div >
        <p>Fazemos as <strong>melhores</strong> decorações</p>
             <div class="div_carrosel_decoracoes">
            
        
              <?php foreach ($dadosDecoracao as $decoracao): 
           
                
                if($decoracao->getHighlighted() == 0){
                    continue;
                }else{
                    if($maximoDeFotosDecoracao == 3)
                    {
                       break;
                    }
                    else
                    {
                        $maximoDeFotosDecoracao += 1;
                    }
                }


                
                 ?>  
                 <a href="<?php echo "./produto.php?id=" . $decoracao->getId() ?>"> <img src="<?php echo "./pag-admin/imagensBanco/" . $decoracao->getFilePath() ?>" alt="imgDecoracao"> </a>
              <?php endforeach;?>

             </div>
             <a class="button_veja-mais" href="decoracoes.php"><p>Veja mais!! </p></a>
    </div>

    <div>
    <img class="criancaMenina" src="./ImagensSite-LuzeCor/Fotos/Criança1_Nuvem.png" align="right" alt="imagem_criana">
    </div>
</section>

<section class="banner_03">
    <div>
        <img class="criancaApontandoCima" src="./ImagensSite-LuzeCor/Fotos/Criança2_Nuvem.png" alt="Criança2_Nuvem">
    </div>
    
    <div class="texto_banner_03">
        <div>
        <p>Na Luz e Cor nós  fazemos mais do</p>
        <p>que decoração de festa infantil, nós </p>
        <p>criamos sorrisos, enchendo cada</p>
        <p>celebração com <strong>alegria, cor e magia.</strong></p>
        </div>
    
        <a class="button_contact" href="/contato.php"><strong>ENTRE EM CONTATO AGORA!</strong></a>
    </div>
</section>

<section class="banner_04">
    <div class="content_parceiros">
        <h2>Buffets Parceiros</h2>
        <div>
            <?php 
                 foreach($dadosParceria as $parceiro):

                    if($maximoDeFotosParcerios == 3)
                    {
                       break;
                    }
                    else
                    {
                        $maximoDeFotosParcerios +=  1;
                    }
              
            ?>
                <img class="imgParceria" src="<?php echo "./pag-admin/imagensBancoParceria/" . $parceiro->getFilePath()?>" alt="<?php $parceiro->getFilePath()?>">
            <?php endforeach;?>
        </div>
        <a class="saibaMais" href="parceria.php">SAIBA MAIS!</a>
    </div>
    <img class="criancaMenino" src="./ImagensSite-LuzeCor/Fotos/Criança5_Nuvem.png" alt="">
    
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