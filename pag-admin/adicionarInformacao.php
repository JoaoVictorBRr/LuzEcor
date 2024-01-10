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
require __DIR__ . "/src-admin/Model-admin/informacao.php";
require __DIR__ . "/src-admin/repository-admin/repositorioInformacao.php";

$informacaoRepositorio = new InformacaoRepositorio($pdo);

if(isset($_POST['cadastro'])){

    $informacao = new InformacaoEmpresa(
        null,
        $_POST['Telefone'], 
        $_POST['Instagram'], 
        $_POST['Facebook'], 
        null

    );

    
    $informacaoRepositorio->salvarInformacoes($informacao);

  

    header("Location: ./adicionarInformacao.php");
}
  

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles-admin/global.css">
    <link rel="stylesheet" href="./styles-admin/adicionarAdmin.css">

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

       

        <form method="POST">
            <h2>EDITAR INFORMAÇÕES DE CONTATO</h2>

        <?php 
        
       
        ?>

            <div class="inputs">
                <br>
                <label for="Telefone">Telefone: </label>
                <input class="input-item" name="Telefone" type="number" value="<?php echo $informacaoRepositorio->getTelefone() ?>">
            </div>

            <div class="inputs">
                <br>
                <label for="Instagram">Instagram: </label>
                <input class="input-item" name="Instagram" type="text" value="<?php echo $informacaoRepositorio->getInstagram() ?>">
            </div>

            <div class="inputs">
                <br>
                <label for="Facebook">Facebook: </label>
                <input class="input-item" name="Facebook" type="text" value="<?php echo $informacaoRepositorio->getFacebook() ?>">
            </div>
               
        <div class="button">
            <input class="button-item" class="button" name="cadastro" type="submit" value="Adicionar">
        </div> 

        </form>
        

    </section>

   

</body>
</html>