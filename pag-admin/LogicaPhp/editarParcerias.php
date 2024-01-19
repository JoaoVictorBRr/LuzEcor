<?php


    require __DIR__ . "../../../src/conection.php";

    require __DIR__ . "../../../src/Model/parceria.php";
    require __DIR__ . "../../../src/repository/repositorioParceria.php";

    $parceriaRepositorio = new parceriaRepositorio($pdo);
    $id = $_GET['id'];

