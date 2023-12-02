<?php

require __DIR__ . "../../src/conection.php";

require __DIR__ . "/src-admin/Model-admin/parceria.php";
require __DIR__ . "/src-admin/repository-admin/repositorioParceria.php";

    $userRepositorio = new parceriaRepositorio($pdo);

    if(isset($_POST['cadastro'])){

        if($_FILES['foto']['name']){
            $parcerio = new Parceria(
                null,
                $_POST['Nome'],
                $_POST['Local'],
                $_POST['horario'],
                $_FILES['foto']['name'],
                intval($_POST['Whatsapp'])
            );
        }
    
        $arquivo = $_FILES['foto'];

        $caminho_destino = str_replace('\\', '/', __DIR__ . './imagensBancoParceria/');
        move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_destino . $arquivo['name']);
        $userRepositorio->salvarDecoracoes($parcerio);

    header("Location: ./adicionarParcerias.php");
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="./styles-admin/adicionarAdmin.css">

    <link rel="shortcut icon" href="../ImagensSite-LuzeCor/Luz e cor.png" type="image/x-icon" />
    <title>Iformações de contato - Admin</title>
</head>
<body>

    
    <header>
        <div class="categorias">
                    <a href="./adicionarInformacao.php"> <strong>Informações de contato</strong></a>
                    <a href="./adicionarDecoracoes.php"><strong>Adicionar Decorações</strong></a>
                    <a href="./adicionarParcerias.php"><strong>Parcerias</strong></a>

        </div>
    </header>
    
    <section class="form">

       

        <form method="POST" enctype="multipart/form-data">
            <h2>EDITAR INFORMAÇÕES DE CONTATO</h2>

            <div class="inputs">
                <br>
                <label for="Nome">Nome: </label>
                <input class="input-item" name="Nome" type="text">
            </div>

            <div class="inputs">
            <br>
                <label for="Local">Local: </label>
                <input class="input-item" name="Local" type="text">
            </div>

            <div class="inputs">
            <br>
                <label for="horario">Horário Aberto: </label>
                <input class="input-item" name="horario" type="text">
            </div>

            <div class="inputs">
            <br>
                <label for="Whatsapp">Whatsapp: </label>
                <input class="input-item" name="Whatsapp" type="number">
            </div>

            <div class="input_foto">
            <br>
                <label for="foto">Adicionar foto: </label>
                <input class="input-item" name="foto" type="file">
            </div>

            <div class="input_foto_adicionadas">
        
               
        <div class="button">
            <input class="button-item" class="button" name="cadastro" type="submit" value="Atualizar">
        </div> 

        </form>
       

    </section>


</body>
</html>