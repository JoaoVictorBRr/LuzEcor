<?php

require __DIR__ . '../../../src/conection.php';

if(isset($_POST['excluirProduto'])){

    require __DIR__ . "../../../src/repository/repositorioDecoracao.php";
    require __DIR__ . "../../../src/Model/decoracao.php";

    $repositorioDecoracoes = new DecoracaoRepositorio($pdo);


    $repositorioDecoracoes->deletarProduto($_GET['id']);
    header("Location: verDecoracoes.php");
}



