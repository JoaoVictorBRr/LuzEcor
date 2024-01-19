<?php



require __DIR__ . "../../../src/conection.php";

require __DIR__ . "../../../src/model/decoracao.php";
require __DIR__ . "../../../src/repository/repositorioDecoracao.php";

require __DIR__ . "../../../src/model/imagem.php";
require __DIR__ . "../../../src/repository/repositorioImagem.php";

$decoracaoRepositorio = new DecoracaoRepositorio($pdo);
$imagemRepositorio = new ImagemRepositorio($pdo);

if(isset($_POST['cadastro'])){

    $fav = ($_POST['favoritar'] == "Sim") ? 1 : 0;
    $imagens = [];

    $decoracao = new Decoracao(
        null,
        $_POST['Tema'], 
        $_POST['Descricao'], 
        $_FILES['capa']['name'],
        $fav, 
        null
    );


    $fotoCapa = $_FILES['capa'];
    
    $caminho_destino = str_replace('\\', '/', __DIR__ . '../../imagensBanco/');
    move_uploaded_file($_FILES['capa']['tmp_name'], $caminho_destino . $fotoCapa['name']);

    $lastId = $decoracaoRepositorio->salvarDecoracoes($decoracao);


    $contagemImagens = 0;

    while($_FILES['foto-'. $contagemImagens]['name']){
       $contagemImagens += 1;
    }

    for($i = 0; $i < $contagemImagens; $i += 1){


        if($_FILES['foto-'. $i]['name'])
        {
            $imagem = new Imagem(
                null,
                null,
                $_FILES['foto-'. $i]['name'],
                null
            );

            $arquivo = $_FILES['foto-'. $i];

            move_uploaded_file($_FILES['foto-'. $i]['tmp_name'], $caminho_destino . $arquivo['name']);
            $imagemRepositorio->salvarImagem($imagem, $lastId);
        }
        else
        {
            continue;
        }
    
      
    }   
       
  

    header("Location: ./adicionarDecoracoes.php");


}


