<?php

require __DIR__ . "../../../src/conection.php";

if(isset($_POST['excluirFoto'])){

    require __DIR__ . "../../../src/model/imagem.php";
    require __DIR__ . "../../../src/repository/repositorioImagem.php";

    $imagemRepositorio = new ImagemRepositorio($pdo);

    $idProduto = $imagemRepositorio->idProduto($_POST['id']);

    $imagem = $imagemRepositorio->imagemUnicaProduto($_POST['id']);

    $caminhoAtual = __DIR__;
    $umNivelAcima = dirname($caminhoAtual);
    $destinoArquivo = $umNivelAcima . "./imagensBanco/" . $imagem;
    
    if (file_exists("$destinoArquivo"))
    {
        if (unlink("$destinoArquivo")) {
            $imagemRepositorio->deletar($_POST['id']);
            header("Location: ../EditarProduto.php?id=$idProduto");
            echo "Arquivo removido com sucesso.";

        } else {
            echo "Erro ao remover o arquivo. Verifique as permissões de arquivo.";
        }

    }else {
        
        echo "O arquivo não existe.";
    }
    


}

