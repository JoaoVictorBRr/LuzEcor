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


include __DIR__ . "/LogicaPhp/editarProduto.php";
 
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles-admin/global.css">
    <link rel="stylesheet" href="./styles-admin/editarDecoracao.css">
    <script src="./script/menuLateral.js" defer></script>
    <script src="./script/adicionarFoto.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="shortcut icon" href="../ImagensSite-LuzeCor/Luz e cor.png" type="image/x-icon" />
    <title>Editar Produto - Admin</title>
</head>
<body>

    
    <header>
        <div class="categorias">
        <a href="./adicionarInformacao.php">INFORMAÇÕES DE CONTATO </a>
                    <a href="./adicionarDecoracoes.php">ADICIONAR DECORAÇÕES  </a>
                    <a href="./adicionarParcerias.php">ADICIONAR PARCERIAS </a>
                    <a href="./verDecoracoes.php">EDITAR DECORACÇÕES</a>
                    <a href="./verParcerias.php">EDITAR PARCERIAS</a>
                    <a href="?logout"><i class="bi bi-box-arrow-left"></i></a>
        </div>
    </header>

     <nav>

        <div class="btn_ativa_menu_lateral"><i class="btn-lateral bi bi-list" onclick="abrirMenu()"></i></div>

        <div class="categorias_barra_lateral" id="categorias_barra_lateral">

                        <i class="bi bi-arrow-left" onclick="fecharMenu()"></i>
                        <a href="./adicionarInformacao.php"><i class="bi bi-person"></i> INFORMAÇÕES DE CONTATO </a>
                        <a href="./adicionarDecoracoes.php"><i class="bi bi-balloon-heart"></i> ADICIONAR DECORAÇÕES  </a>
                        <a href="./adicionarParcerias.php"><i class="bi bi-people-fill"></i> ADICIONAR PARCERIAS </a>
                        <a href="./verDecoracoes.php"><i class="bi bi-pen"></i> EDITAR DECORACÇÕES</a>
                        <a href="./verParcerias.php"><i class="bi bi-pen"></i> EDITAR PARCERIAS</a>
                        <a href="?logout"><i class="bi bi-box-arrow-left"></i></a>
                        
        </div>

    </nav>
    
    <section class="form">
    <h2>EDITAR PRODUTO</h2>

    <form action="./LogicaPhp/excluirProduto.php?id=<?php echo $id; ?>" method="POST">
        <button class="excluirProduto" type="submit" name="excluirProduto">Excluir Decoração</button>
    </form>

    <button onclick="AddImg()" id="addImg">Adicionar Mais Fotos</button>

    


        <form method="POST" enctype="multipart/form-data">

        
        <div class="arquivos">
            <div class="input_capa">

                    <label class="label-arquivo" for="capa"><strong> Adicionar capa </strong></label>
                    <input id="capa" class="input-item arquivo" name="capa" type="file" >

                </div>

                <div class="input_foto">

                    <label class="label-arquivo" for="foto-0"><strong> Adicionar fotos</strong> </label>
                    <input id="foto-0" class="input-item arquivo" name="foto-0" type="file" >

                </div>
            </div>
            <div class="inputs_container">

            <div class="inputs">
            <br>
                <label class="labels" for="Tema">Tema: </label>
                <input class="input-item" name="Tema" type="text" value="<?php echo $decoracaoRepositorio->getTitle($id) ?>">
            </div>

            <div class="inputs">
                <br>
                <label class="labels" for="Descricao">Descrição: </label>
                <input class="input-item" name="Descricao" type="text" value="<?php echo $decoracaoRepositorio->getDescription($id) ?>">
            </div>

          
            <div class="inputs_favoritar">

                    <p>Favoritar</p>
                   
                    <?php if( $decoracaoRepositorio->getFavorito($id) == 1):?>
                        <div>
                            <input class="btn-radio" type="radio" id="fav_sim" name="favoritar" value="Sim" checked>
                            <label class="label-radio" for="fav_sim">Sim</label>
                        </div>
                        <div>
                            <input class="btn-radio" type="radio" id="fav_nao" name="favoritar" value="Nao">
                            <label class="label-radio" for="fav_nao">Não</label>
                        </div>
                    <?php else: ?>
                        <div>
                            <input class="btn-radio" type="radio" id="fav_sim" name="favoritar" value="Sim">
                            <label class="label-radio" for="fav_sim">Sim</label>
                        </div>
                        <div>
                            <input class="btn-radio" type="radio" id="fav_nao" name="favoritar" value="Nao" checked>
                            <label class="label-radio" for="fav_nao">Não</label>   
                        </div>
                    <?php endif; ?>
                </div>
             </div>
               
        <div class="button">
            <input class="button-item" class="button" name="atualizar" type="submit" value="Atualizar">
        </div> 

        </form>

                <p>Foto de capa: </p>
              

                <form class="imagens" action="./LogicaPhp/excluirCapa.php" method="POST">
                    <img class="capaProduto" src=" <?php echo "./imagensBancoParceria/" .  $decoracaoRepositorio->getFotoCapa($id)?>" alt="<?php echo  $decoracaoRepositorio->getFotoCapa($id)?>">
               
                    <input type="hidden" name="id" value="<?php echo  $id ?>">
                    <?php if($decoracaoRepositorio->getFotoCapa($id))
                        {
                            echo '<button class="removeBtn" name="excluirCapa" type="submit"> X </button>';
                        }
                    ?>
                </form>

                <p>Fotos adicionadas: </p>


                <?php foreach($listaImagem as $imagem):?>
         
                <form action="./LogicaPhp/excluirFoto.php" method="POST">
                    <img class="capaProduto" src="<?php echo "./imagensBanco/" .  $imagem->getArquivo(); ?>" alt="<?php $imagem->getArquivo()?>">
                 
                    <input type="hidden" name="id" value="<?php echo $imagem->getId() ?>">

                    <button class="removeBtn" name="excluirFoto" type="submit">X</button>
                </form>
            
                <?php endforeach;?>   
       

    </section>



</body>
</html>