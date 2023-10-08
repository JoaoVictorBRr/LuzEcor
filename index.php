<?php 

    require "./src/conection.php";

    $sql1 = "SELECT file_path, highlighted  FROM decoracoes";
    $statement = $pdo->query($sql1);
    $Decoracoes =  $statement->fetchAll(mode: PDO::FETCH_ASSOC);

    $sql2 = "SELECT file_path FROM parcerias";
    $statement2 = $pdo->query($sql2);
    $Parcerias = $statement2->fetchAll(mode: PDO::FETCH_ASSOC); 


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/pags/index.css">
</head>
<body>
<header>
    <a href="/">  <img class="logo_LuzECor" src="./ImagensSite-LuzeCor/Luz e cor.png" alt="Logo"> </a> 
    <a class="menu" href="">DECORAÇÕES</a>
    <a class="menu" href="/parceria.php">PARCERIA</a>
    <a class="menu" href="/contato.php">CONTATO</a>
    <a href="">  <img class="logo_Whats" src="./ImagensSite-LuzeCor/Fotos/Whats.png" alt="LogoWhats" > </a> 
</header>

<section class="banner_01">
    <div class="main_content_banner_01"> 
        <div>
            <img class="criancaBalao" src="./ImagensSite-LuzeCor/Fotos/Criança3_Nuvem.png" alt="Criança3_Nuvem">
        </div>
        <div class="texto_banner_01">
            <h2>Encante, surpreenda e celebre!</h2>
            <div>
            <p>Na nossa equipe, criamos as </p>
            <p>decorações de festa infantil mais</p>
            <p> mágicas e memoráveis.</p>
            </div>
            <a class="button_contact" href=""><strong>ENTRE EM CONTATO AGORA!</strong></a>
        </div>
    </div>
</section>

<section class="banner_02">
    <div >
        <p>Fazemos as <strong>melhores</strong> decorações</p>
             <div class="div_carrosel_decoracoes">
            
        
              <?php foreach ($Decoracoes as $DecoracaoImg): 
                if($DecoracaoImg['highlighted'] == 0){
                    continue;
                }
                 ?>  
                 <a href=""> <img src="<?php echo "./ImagensSite-LuzeCor/Fotos_decoracoes/" . $DecoracaoImg['file_path'] ?>" alt="imgDecoracao"> </a>
              <?php endforeach;?>

             </div>
    </div>
    <img class="criancaMenina" src="./ImagensSite-LuzeCor/Fotos/Criança1_Nuvem.png" align="right" alt="">
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
    
        <a class="button_contact" href=""><strong>ENTRE EM CONTATO AGORA!</strong></a>
    </div>
</section>

<section class="banner_04">
    <div class="content_parceiros">
        <h2>Buffets Parceiros</h2>
        <div>
            <?php 
                 foreach($Parcerias as $parceiro):
                $i = 0;
                if($i == 3)
                {
                   break;
                }
                else
                {
                    $i += 1;
                }
            ?>
                <img class="imgParceria" src="<?php echo "./ImagensSite-LuzeCor/Fotos/Buffet/" . $parceiro["file_path"]?>" alt="<?php $parceiro["file_path"]?>">
            <?php endforeach;?>
        </div>
        <a class="saibaMais" href="">SAIBA MAIS!</a>
    </div>
    <img class="criancaMenino" src="./ImagensSite-LuzeCor/Fotos/Criança5_Nuvem.png" alt="">
    
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
    <a href=""> <img class="iconFacebook_footer" src="./ImagensSite-LuzeCor/Fotos/FAce.png" alt=""></a>
    <a href=""> <img class="iconInstagram_footer" src="./ImagensSite-LuzeCor/Fotos/Insta.png" alt=""></a>
    </div>
</div>
</footer>
    
</body>
</html>