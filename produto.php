<?php 

    require "./src/conection.php";

    require "./pag-admin/src-admin/Model-admin/informacao.php";
    require "./pag-admin/src-admin/repository-admin/repositorioInformacao.php";

    require "./src/Model/decoracao.php";
    require "./src/Model/imagem.php";
    require "./src/Model/comentario.php";
    
    require "./src/repository/repositorioDecoracao.php";
    require "./src/repository/repositorioComentarios.php";
    require "./src/repository/repositorioImagem.php";

    $id = $_GET['id'];

   

    $informacaoRepositorio = new InformacaoRepositorio($pdo);

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

<div class="botao_whatsapp">
        <a href="https://wa.me/5519996017447?text=Olá,%20gostaria%20de%20uma%20festa!!"><img src="./ImagensSite-LuzeCor/WhatsApp-Logo.png" alt="WhatsApp Logo"></a>
</div>

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



<section class="Produto_container">



        <div class="descricaoProduto">

            <p><?php echo $PodutoRepositorio->getTitle($id) ?></p>
        
        
        </div>

        <div class="imagensProduto_container">
        
            <?php foreach ($dadosImagem as $imagem): ?>  
            <img class="imagem_produto" src="<?php echo "./pag-admin/imagensBanco/" . $imagem->getArquivo() ?>" alt="imagemDecoracao">
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