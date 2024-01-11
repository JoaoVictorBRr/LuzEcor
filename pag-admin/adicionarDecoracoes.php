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

$decoracaoRepositorio = new DecoracaoRepositorio($pdo);
$imagemRepositorio = new ImagemRepositorio($pdo);

if(isset($_POST['cadastro'])){

    $fav = ($_POST['favoritar'] == "Sim") ? 1 : 0;
    $imagens = [];

    $decoracao = new Decoracao(
        null,
        $_POST['Tema'], 
        $_POST['Descricao'], 
        $_FILES['foto'. 0]['name'],
        $fav, 
        null
    );

    $lastId = $decoracaoRepositorio->salvarDecoracoes($decoracao);

    $contagemImagens = 1;

    while($_FILES['foto'. $contagemImagens]['name']){
       $contagemImagens += 1;
    }

    for($i = 0; $i < $contagemImagens; $i += 1){


        if($_FILES['foto'. $i]['name']){
            $imagem = new Imagem(
                null,
                null,
                $_FILES['foto'. $i]['name'],
                null
            );
        }else{
            continue;
        }
    
        $arquivo = $_FILES['foto'. $i];

        $caminho_destino = str_replace('\\', '/', __DIR__ . './imagensBanco/');
       move_uploaded_file($_FILES['foto'. $i]['tmp_name'], $caminho_destino . $arquivo['name']);
        $imagemRepositorio->salvarImagem($imagem, $lastId);
    }   
       
  

    header("Location: ./adicionarDecoracoes.php");


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
    <title>Iformações de contato - Admin</title>
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
    <h2>EDITAR INFORMAÇÕES DE CONTATO</h2>

    <button onclick="AddImg()" id="addImg">Adicionar Mais Fotos</button>


        <form method="POST" enctype="multipart/form-data">

        <div class="input_capa">
                <br>
                <label for="foto">Adicionar capa: </label>
                <input id="foto" class="input-item" name="foto0" type="file">
         
            </div>

            <div class="input_foto">
                <br>
                <label for="foto">Adicionar foto: </label>
                <input id="foto" class="input-item" name="foto1" type="file">
         
            </div>

            <div class="inputs">
            <br>
                <label for="Tema">Tema: </label>
                <input class="input-item" name="Tema" type="text">
            </div>

            <div class="inputs">
                <br>
                <label for="Descricao">Descrição: </label>
                <input class="input-item" name="Descricao" type="text">
            </div>

          


            <div class="inputs_favoritar">
                    <br>
                    <p>Favoritar:</p>
                    <br>
                    <input type="radio" id="fav_sim" name="favoritar" value="Sim">
                    <label for="fav_sim">Sim</label>
                    <br>
                    <input type="radio" id="fav_nao" name="favoritar" value="Nao">
                    <label for="fav_nao">Não</label>
                </div>
               
        <div class="button">
            <input class="button-item" class="button" name="cadastro" type="submit" value="Adicionar">
        </div> 

        </form>
       

    </section>



</body>
</html>