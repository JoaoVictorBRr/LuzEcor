<?php

require __DIR__ . '../../../src/conection.php';

if(isset($_POST['excluirProduto'])){

    require __DIR__ . "../../../src/repository/repositorioImagem.php";
    require __DIR__ . "../../../src/Model/imagem.php";

    require __DIR__ . "../../../src/repository/repositorioDecoracao.php";
    require __DIR__ . "../../../src/Model/decoracao.php";

    $repositorioDecoracoes = new DecoracaoRepositorio($pdo);
    $repositorioImagens = new ImagemRepositorio($pdo);
    $imagens = $repositorioImagens->listaImagem($_GET['id']);

    $caminhoAtual = __DIR__;
    $umNivelAcima = dirname($caminhoAtual);

    foreach($imagens as $imagem){

        $destinoArquivoFotos = $umNivelAcima . "./imagensBanco/" . $imagem->getArquivo();
        unlink($destinoArquivoFotos);

    }

    $destinoArquivoCapa = $umNivelAcima . "./imagensBanco/" . $repositorioDecoracoes->getFotoCapa($_GET['id']);

    unlink($destinoArquivoCapa);



    $repositorioDecoracoes->deletarProduto($_GET['id']);
    header("Location: ../verDecoracoes.php");
}



