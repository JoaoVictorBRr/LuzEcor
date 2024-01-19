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


include __DIR__ . "/LogicaPhp/adicionarDecoracoes.php";
  

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles-admin/global.css">
    <script src="./script/adicionarFoto.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="../ImagensSite-LuzeCor/Luz e cor.png" type="image/x-icon" />
    <title>Adicionar Decorações - Admin</title>
</head>
<body>

    
    <header>
        <div class="categorias">
                    <a href="./adicionarInformacao.php">INFORMAÇÕES DE CONTATO </a>
                    <p class="separadorMenu">|</p>
                    <a href="./adicionarDecoracoes.php">ADICIONAR DECORAÇÕES  </a>
                    <p class="separadorMenu">|</p>
                    <a href="./adicionarParcerias.php">ADICIONAR PARCERIAS </a>
                    <p class="separadorMenu">|</p>
                    <a href="./verDecoracoes.php">EDITAR DECORACÇÕES</a>
                    <p class="separadorMenu">|</p>
                    <a href="./verParcerias.php">EDITAR PARCERIAS</a>
                    <p class="separadorMenu">|</p>
                    <a href="?logout"><i class="bi bi-box-arrow-left"></i></a>
        </div>
    </header>
    
    <section class="form">
    <h2>ADICIONAR DECORAÇÕES</h2>

    <button onclick="AddImg()" id="addImg">Adicionar Mais Fotos</button>
    


        <form method="POST" enctype="multipart/form-data">

        <div class="arquivos">

            <div class="input_capa">  

                <label class="label-arquivo" for="capa"> <strong> Adicionar capa: </strong></label>
                <input id="capa" class="input-item arquivo" name="capa" type="file" required>

            </div>

            <div class="input_foto">
    
                <label class="label-arquivo" for="foto-0"><strong>Adicionar foto: </strong></label>
                <input id="foto-0" class="input-item arquivo" name="foto-0" type="file">
            </div>

        </div>
            <div class="inputs_container">

                <div class="inputs">
    
                    <label class="labels" for="Tema">Tema</label>
                    <input class="input-item" name="Tema" type="text" placeholder="Digite aqui..." required>
            
                </div>

                <div class="inputs">
                
                    <label class="labels" for="Descricao">Descrição </label>
                    <input class="input-item" name="Descricao" placeholder="Digite aqui..." type="text">
                </div>

            


                <div class="inputs_favoritar">
                 
                        <p>Favoritar</p>
                        <div>
                            <input type="radio" id="fav_sim" name="favoritar" value="Sim" class="btn-radio">
                            <label class="label-radio" for="fav_sim">Sim</label>
                        </div>
                        <div>
                            <input type="radio" id="fav_nao" name="favoritar" value="Nao" class="btn-radio">
                            <label class="label-radio" for="fav_nao">Não</label>
                        </div>
                    </div>

                </div>
               
        <div class="button">
            <input class="button-item" class="button" name="cadastro" type="submit" value="Adicionar">
        </div> 

        </form>
       

    </section>



</body>
</html>