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

    $indiceAleatorio = rand(0, 1000);


    $foto = ($_FILES['Foto']['name']) ? $indiceAleatorio . "-" . $_FILES['Foto']['name'] : $dadosParceria->getFoto($_GET['id']);

    $parceiro = new Parceria(
        null,
        $_POST['Nome'],
        $_POST['Local'],
        $_POST['horario'],
        $_POST['Whatsapp'],
        $foto,
        null
    );

    if($_FILES['Foto']['name']){

        $caminhoAtual = __DIR__;
        $umNivelAcima = dirname($caminhoAtual);
        $destinoArquivoCapa = $umNivelAcima . "./imagensBancoParceria/" . $dadosParceria->getFoto($_GET['id']);

        unlink($destinoArquivoCapa);

        $foto = $indiceAleatorio . "-" . $_FILES['Foto']['name'];

        $caminho_destino = str_replace('\\', '/', $caminhoAtual . '../../imagensBancoParceria/');
        move_uploaded_file($_FILES['Foto']['tmp_name'], $caminho_destino . $foto);
    
    }

    $dadosParceria->atualizarParceria($parceiro, $_GET['id']);

    header("Location: ../verParcerias.php");
}

