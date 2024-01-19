<?php

require __DIR__ . '../../../src/conection.php';

if(isset($_POST['excluirParceria'])){

    require __DIR__ . '../../../src/Model/parceria.php';
    require __DIR__ . '../../../src/repository/repositorioParceria.php';

    $dadosParceria = new parceriaRepositorio($pdo);

    $dadosParceria->deletarParceria($_GET['id']);

    header("Location: verParcerias.php");

}