<?php

include __DIR__ . '../../src/conection.php';

include __DIR__ . "../../src/repository/repositorioDecoracao.php";
include __DIR__ . "../../src/Model/decoracao.php";

$repositorioDecoracoes = new DecoracaoRepositorio($pdo);


if(isset($_POST['excluirProduto'])){
    $repositorioDecoracoes->deletarProduto($_GET['id']);
    header("Location: verDecoracoes.php");
}



