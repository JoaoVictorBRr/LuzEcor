<?php 

    require "./src/conection.php";

    require "./src/Model/decoracao.php";
    require "./src/Model/imagem.php";
    require "./src/Model/comentario.php";
    
    require "./src/repository/repositorioDecoracao.php";
    require "./src/repository/repositorioComentarios.php";
    require "./src/repository/repositorioImagem.php";

    $id = $_GET['id'];

   

    $PodutoRepositorio = new DecoracaoRepositorio($pdo);

    $ImagemRepositorio = new ImagemRepositorio($pdo);
    $dadosImagem = $ImagemRepositorio->listaImagem($id); 

    $comentarioRepositorio = new ComentarioRepositorio($pdo);
    $dadosComentario = $comentarioRepositorio->listaComentario($id); 
    

   

    if(isset($_POST['cadastro'])){

    $numeroAleatorio = rand(1, 5);
    $foto = "Monstro" . $numeroAleatorio . ".png";

    $decoracao = new Comentario(
        null,
        $_POST['nome'], 
        $_POST['comentario'] , 
        $foto,
        $id, 
        null

    );

    $comentarioRepositorio->salvarComentario($decoracao);

    header("Location: produto.php?id=" . $id);

}
   

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luz e Cor - Home</title>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/pags/produto.css">
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


<section class="Produto_container">



        <div class="descricaoProduto">

            <p><?php echo $PodutoRepositorio->getTitle($id) ?></p>
        
        
        </div>

        <div class="imagensProduto_container">
        
            <?php foreach ($dadosImagem as $imagem): ?>  
            <img class="imagem_produto" src="<?php echo "./ImagensSite-LuzeCor/Fotos_decoracoes/" . $imagem->getArquivo() ?>" alt="imagemDecoracao">
            <?php endforeach;?>
    
        </div>


</section>



<section class="comentarios_container" >

        <div class="comentarios_div">
            <?php 
              if(!$dadosComentario){
                echo "<h3>Sem comentários</h3>";
              }
              else{
                echo "<h3>Comentários</h3>";
              }
            ?>
            
            <?php foreach ($dadosComentario as $comentario): 
                
            $dataCometario = $comentario->getDataUpdate();
            $dataFormatada = DateTime::createFromFormat('Y-m-d H:i:s', $dataCometario)->format('d/m/Y H:i');

            ?>

                <div class="comentario">  
                    <div class="comentario_content">

                        <div>
                            <img class="foto_pessoa" src="<?php echo "./ImagensSite-LuzeCor/Fotos/monstros/" . $comentario->getFoto() ?>" alt="">
                            <p><?php echo $comentario->getNome() ?></p>
                        </div>

                        <div>
                            <p><?php echo $dataFormatada ?></p>
                        </div>
                        
                 </div>
                    <p>Comentario: <?php echo $comentario->getComentario() ?>  </p>

                </div>
                
            <?php endforeach;?>
        </div>  
        
        <form method="POST">
                <h3>Adcionar comentário</h3>
                <div>
                    <label for="nome">Nome: </label>
                    <input name="nome" id="nome" type="text">
                </div>

                <div>
                    <label for="comentario">Comentário: </label>
                    <textarea width="100px" height="100px" name="comentario" id="comentario" type="text"> </textarea>
                </div>

                <div>
                    <input name="cadastro" class="button_submit" type="submit" value="Enviar">
                </div>

        </form>

  
</section>

<section class="banner_02">
    <div class="main_content_banner_02"> 
        <div class="criancaMenino_div">
            <img class="criancaMenino" src="./ImagensSite-LuzeCor/Fotos/Criança8.png" alt="Criança_Nuvem">
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
<a href="https://wa.me/5519996017447?text=Olá,%20gostaria%20de%20uma%20festa!!">  <img class="iconWhats_footer" src="./ImagensSite-LuzeCor/Fotos/Whats.png" alt="LogoWhats" > </a> 
<p><strong>(19) 99601-7447</strong></p>
</div>
</div>
<div class="redes_footer">
    <h3>Redes sociais</h3> 
    <div class="redes_footer_icons">
    <a href="https://www.facebook.com/luzecorfestas"> <img class="iconFacebook_footer" src="./ImagensSite-LuzeCor/Fotos/FAce.png" alt=""></a>
    <a href="https://www.instagram.com/luz_e_cor_festas/"> <img class="iconInstagram_footer" src="./ImagensSite-LuzeCor/Fotos/Insta.png" alt=""></a>
    </div>
</div>
</footer>
    
</body>
</html>