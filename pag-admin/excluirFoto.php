<?php

require __DIR__ . "../../src/conection.php";

require __DIR__ . "../../src/model/imagem.php";
require __DIR__ . "../../src/repository/repositorioImagem.php";

$imagemRepositorio = new ImagemRepositorio($pdo);

$idProduto = $imagemRepositorio->idProduto($_POST['id']);
$imagemRepositorio->deletar($_POST['id']);

header("Location: EditarProduto.php?id=$idProduto");