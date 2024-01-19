<?php 

require __DIR__ . '../../../src/conection.php';

if(isset($_POST['atualizarFotoParceria'])){

    require __DIR__ . '../../../src/Model/parceria.php';
    require __DIR__ . '../../../src/repository/repositorioParceria.php';

    $dadosParceria = new parceriaRepositorio($pdo);

    $fotoCapa = $_FILES['atualizarFoto'];

    $dadosParceria->atualizarFoto( $fotoCapa['name'], $_GET['id']);
    
    $caminho_destino = str_replace('\\', '/', __DIR__ . './imagensBanco/');
    move_uploaded_file($_FILES['atualizarFoto']['tmp_name'], $caminho_destino . $fotoCapa['name']);
    
    header("Location: verParcerias.php");
}

if(isset($_POST['Atualizar'])){

    require __DIR__ . '../../../src/Model/parceria.php';
    require __DIR__ . '../../../src/repository/repositorioParceria.php';

    $dadosParceria = new parceriaRepositorio($pdo);


    $foto = ($_FILES['Foto']['name']) ? $_FILES['Foto']['name'] : $dadosParceria->getFoto($_GET['id']);

    $parceiro = new Parceria(
        null,
        $_POST['Nome'],
        $_POST['Local'],
        $_POST['horario'],
        $_POST['Whatsapp'],
        $foto,
        null
    );

    $dadosParceria->atualizarParceria($parceiro, $_GET['id']);

    if($_FILES['Foto']['name']){


        $caminho_destino = str_replace('\\', '/', __DIR__ . '../../imagensBancoParceria/');
        move_uploaded_file($_FILES['Foto']['tmp_name'], $caminho_destino . $_FILES['Foto']['name']);
    

    }

    header("Location: ../verParcerias.php");
}

