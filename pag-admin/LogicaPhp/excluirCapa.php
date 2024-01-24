<?php

require __DIR__ . "../../../src/conection.php";

if(isset($_POST['excluirCapa'])){

    require __DIR__ . "../../../src/model/decoracao.php";
    require __DIR__ . "../../../src/repository/repositorioDecoracao.php";

    $decoracaoRepositorio = new DecoracaoRepositorio($pdo);

    $decoracaoRepositorio->deletar($_POST['id']);
    $id = $_POST['id'];

    header("Location: ../EditarProduto.php?id=$id");

}

