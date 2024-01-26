<?php


 require __DIR__ . "../../../src/conection.php";

require __DIR__ . "../../../src/Model/parceria.php";
require __DIR__ . "../../../src/repository/repositorioParceria.php";

    $userRepositorio = new parceriaRepositorio($pdo);

    if(isset($_POST['cadastro'])){

        $indiceAleatorio = rand(0, 1000);

        //Só cria se existir uma imagem na parceria

        if($_FILES['foto']['name']){
            $parcerio = new Parceria(
                null,
                $_POST['Nome'],
                $_POST['Local'],
                $_POST['horario'],
                $_POST['Whatsapp'],
                $indiceAleatorio . "-" . $_FILES['foto']['name'],
                null
            );
        }
    
        $arquivo = $indiceAleatorio . "-" . $_FILES['foto']['name'];

        $caminho_destino = str_replace('\\', '/', __DIR__ . '../../imagensBancoParceria/');
        move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_destino . $arquivo);
        $userRepositorio->salvarDecoracoes($parcerio);

    header("Location: ./adicionarParcerias.php");
    }
