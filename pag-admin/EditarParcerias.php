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

    require __DIR__ . "../../src/Model/parceria.php";
    require __DIR__ . "../../src/repository/repositorioParceria.php";

    $parceriaRepositorio = new parceriaRepositorio($pdo);
    $id = $_GET['id'];

    if(isset($_POST['cadastro'])){

        if($_FILES['foto']['name']){
            $parcerio = new Parceria(
                null,
                $_POST['Nome'],
                $_POST['Local'],
                $_POST['horario'],
                intval($_POST['Whatsapp']),
                $_FILES['foto']['name'],
                null
            );
        }
    
        $arquivo = $_FILES['foto'];

        $caminho_destino = str_replace('\\', '/', __DIR__ . './imagensBancoParceria/');
        move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_destino . $arquivo['name']);
        $parceriaRepositorio->salvarDecoracoes($parcerio);

    header("Location: ./adicionarParcerias.php");
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
    <title>Editar Parcerias - Admin</title>
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

       

        <form method="POST" enctype="multipart/form-data">
            <h2>EDITAR PARCERIAS</h2>

            <div class="inputs">
                <br>
                <label for="Nome">Nome: </label>
                <input class="input-item" name="Nome" type="text" value="<?php echo $parceriaRepositorio->getNome($id) ?>">
            </div>

            <div class="inputs">
            <br>
                <label for="Local">Local: </label>
                <input class="input-item" name="Local" type="text" value="<?php echo $parceriaRepositorio->getLocal($id) ?>">
            </div>

            <div class="inputs">
            <br>
                <label for="horario">Horário Aberto: </label>
                <input class="input-item" name="horario" type="text" value="<?php echo $parceriaRepositorio->getHorario($id) ?>">
            </div>

            <div class="inputs">
            <br>
                <label for="Whatsapp">Whatsapp: </label>
                <input class="input-item" name="Whatsapp" type="number" value="<?php echo $parceriaRepositorio->getCelular($id) ?>">
            </div>

            <div class="input_foto_adicionadas">
        
               
            <div class="button">
                <input class="button-item" class="button" name="cadastro" type="submit" value="Atualizar">
            </div> 

        </form>
       

    </section>


</body>
</html>