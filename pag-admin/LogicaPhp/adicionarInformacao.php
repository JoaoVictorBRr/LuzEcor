<?php

require __DIR__ . "../../../src/conection.php";
require __DIR__ . "../../src-admin/Model-admin/informacao.php";
require __DIR__ . "../../src-admin/repository-admin/repositorioInformacao.php";

$informacaoRepositorio = new InformacaoRepositorio($pdo);

if(isset($_POST['cadastro'])){


    $informacao = new InformacaoEmpresa(
        null,
        $_POST['Telefone'],
        $_POST['Instagram'], 
        $_POST['Facebook'], 
        null

    );

    
    $informacaoRepositorio->salvarInformacoes($informacao);

  

    header("Location: ./adicionarInformacao.php");
}
  
