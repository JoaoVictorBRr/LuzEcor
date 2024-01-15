<?php 

session_start();

if(!isset($_SESSION['login'])){  
    include('login.php');
    exit;
 }else if(isset($_GET['logout'])){
    unset($_SESSION['login']);
    session_destroy();
    header('Location: login.php');
 }


 require __DIR__ . "../../src/conection.php";

 require __DIR__ . "../../src/model/decoracao.php";
 require __DIR__ . "../../src/repository/repositorioDecoracao.php";
 
 require __DIR__ . "../../src/model/imagem.php";
 require __DIR__ . "../../src/repository/repositorioImagem.php";

 $id = $_GET['id'];
 
 $decoracaoRepositorio = new DecoracaoRepositorio($pdo);
 $imagemRepositorio = new ImagemRepositorio($pdo);

 $listaImagem = $imagemRepositorio->listaImagem($id);


 
 if(isset($_POST['atualizar'])){
 
     $fav = ($_POST['favoritar'] == "Sim") ? 1 : 0;
     $imagens = [];

     $img = ($_FILES['capa']['name']) ? $_FILES['capa']['name'] : $decoracaoRepositorio->getFotoCapa($id);
     $decoracao = new Decoracao(
         null,
         $_POST['Tema'], 
         $_POST['Descricao'], 
         $img,
         $fav, 
         null
     );
 
     $decoracaoRepositorio->atualiarDecoracoes($decoracao, $id);

     $contagemImagens = 0;

     while($_FILES['foto-'. $contagemImagens]['name']){
        $contagemImagens += 1;
     }
 
     for($i = 0; $i < $contagemImagens; $i += 1){
 
         if($_FILES['foto-'. $i]['name']){
             $imagem = new Imagem(
                 null,
                 null,
                 $_FILES['foto-'. $i]['name'],
                 null
             );
         }else{
             continue;
         }
     
         $arquivo = $_FILES['foto-'. $i];
 
         $caminho_destino = str_replace('\\', '/', __DIR__ . './imagensBanco/');
         move_uploaded_file($_FILES['foto-'. $i]['tmp_name'], $caminho_destino . $arquivo['name']);
         
         $imagemRepositorio->salvarImagem($imagem, $id);
     }   
        
    header("Location: ./EditarProduto.php?id=$id");
 
 
 }
 



?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles-admin/global.css">
    <link rel="stylesheet" href="./styles-admin/adicionarAdmin.css">
    <script src="./script/adicionarFoto.js" defer></script>

    <link rel="shortcut icon" href="../ImagensSite-LuzeCor/Luz e cor.png" type="image/x-icon" />
    <title>Editar Produto - Admin</title>
</head>
<body>

    
    <header>
        <div class="categorias">
                    <a href="./adicionarInformacao.php"><strong>Informações de contato</strong></a>
                    <a href="./adicionarDecoracoes.php"><strong>Adicionar Decorações</strong></a>
                    <a href="./adicionarParcerias.php"><strong>Adicionar Parcerias</strong></a>
                    <a href="./verDecoracoes.php"><strong>Editar Decoraçoes</strong></a>
                    <a href="./verParcerias.php"><strong>Editar Parcerias</strong></a>
                    <a href="?logout"><strong>LogOut</strong></a>
        </div>
    </header>
    
    <section class="form">
    <h2>EDITAR PRODUTO</h2>

    <form action="excluirProduto.php?id=<?php echo $id; ?>" method="POST">
        <button type="submit" name="excluirProduto">X</button>
    </form>

    <button onclick="AddImg()" id="addImg">Adicionar Mais Fotos</button>

    


        <form method="POST" enctype="multipart/form-data">

        <div class="input_capa">

                <label for="capa">Adicionar capa: </label>
                <input id="capa" class="input-item" name="capa" type="file" >

            </div>

            <div class="input_foto">

                <label for="foto-0">Adicionar fotos: </label>
                <input id="foto-0" class="input-item" name="foto-0" type="file" >

            </div>

            <div class="inputs">
            <br>
                <label for="Tema">Tema: </label>
                <input class="input-item" name="Tema" type="text" value="<?php echo $decoracaoRepositorio->getTitle($id) ?>">
            </div>

            <div class="inputs">
                <br>
                <label for="Descricao">Descrição: </label>
                <input class="input-item" name="Descricao" type="text" value="<?php echo $decoracaoRepositorio->getDescription($id) ?>">
            </div>

          
            <div class="inputs_favoritar">

                    <br>
                    <p>Favoritar:</p>
                    <br>
                    <?php if( $decoracaoRepositorio->getFavorito($id) == 1):?>
                        <input type="radio" id="fav_sim" name="favoritar" value="Sim" checked>
                        <label for="fav_sim">Sim</label>
                        <br>
                        <input type="radio" id="fav_nao" name="favoritar" value="Nao">
                        <label for="fav_nao">Não</label>
                    <?php else: ?>
                        <input type="radio" id="fav_sim" name="favoritar" value="Sim">
                        <label for="fav_sim">Sim</label>
                        <br>
                        <input type="radio" id="fav_nao" name="favoritar" value="Nao" checked>
                        <label for="fav_nao">Não</label>   
                    <?php endif; ?>
                </div>
               
        <div class="button">
            <input class="button-item" class="button" name="atualizar" type="submit" value="Atualizar">
        </div> 

        </form>

        <br>

           
                <p>Foto de capa: </p>
              

                <form action="excluirCapa.php" method="POST">
                    <p> <?php echo  $decoracaoRepositorio->getFotoCapa($id); ?></p>
                    <input type="hidden" name="id" value="<?php echo  $id ?>">
                    <button type="submit">X</button>
                </form>

                <p>Fotos adicionadas: </p>


                <?php foreach($listaImagem as $imagem):?>
         
                <form action="excluirFoto.php" method="POST">
                    <p> <?php echo $imagem->getArquivo(); ?></p>
                    <input type="hidden" name="id" value="<?php echo $imagem->getId() ?>">

                    <button type="submit">X</button>
                </form>
            
                <?php endforeach;?>   
       

    </section>



</body>
</html>