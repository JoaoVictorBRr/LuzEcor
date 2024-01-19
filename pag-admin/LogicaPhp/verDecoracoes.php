<?php

    require __DIR__ . "../../../src/conection.php";
    require __DIR__ . "../../../src/Model/decoracao.php";
    require __DIR__ . "../../../src/repository/repositorioDecoracao.php";


    require __DIR__ . "../../src-admin/Model-admin/informacao.php";
    require __DIR__ . "../../src-admin/repository-admin/repositorioInformacao.php";

    $decoracaoRepositorio = new DecoracaoRepositorio($pdo);
    $dadosDecoracao = $decoracaoRepositorio->listaDecoracao();

    $informacaoRepositorio = new InformacaoRepositorio($pdo);