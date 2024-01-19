<?php


 require __DIR__ . "../../../src/conection.php";

require __DIR__ . "../../../src/Model/parceria.php";
require __DIR__ . "../../../src/repository/repositorioParceria.php";

    $userRepositorio = new parceriaRepositorio($pdo);

    if(isset($_POST['cadastro'])){

        //Só cria se existir uma imagem na parceria

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

        $caminho_destino = str_replace('\\', '/', __DIR__ . '../../imagensBancoParceria/');
        move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_destino . $arquivo['name']);
        $userRepositorio->salvarDecoracoes($parcerio);

    header("Location: ./adicionarParcerias.php");
    }
