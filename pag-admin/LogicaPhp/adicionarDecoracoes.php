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

    $indiceAleatorio = rand(0, 1000);

    $decoracao = new Decoracao(
        null,
        $_POST['Tema'], 
        $_POST['Descricao'], 
        $indiceAleatorio . "-" .$_FILES['capa']['name'],
        $fav, 
        null
    );


    $fotoCapa = $indiceAleatorio . "-" . $_FILES['capa']['name'];
    
    $caminho_destino = str_replace('\\', '/', __DIR__ . '../../imagensBanco/');
    move_uploaded_file($_FILES['capa']['tmp_name'], $caminho_destino . $fotoCapa);

    $lastId = $decoracaoRepositorio->salvarDecoracoes($decoracao);


    $contagemImagens = 0;

    while($_FILES['foto-'. $contagemImagens]['name']){
       $contagemImagens += 1;
    }

    for($i = 0; $i < $contagemImagens; $i += 1){

        $arquivo = $i . "-" . $_FILES['foto-'. $i]['name'];

        if($_FILES['foto-'. $i]['name'])
        {
            $imagem = new Imagem(
                null,
                null,
                $arquivo,
                null
            );

            move_uploaded_file($_FILES['foto-'. $i]['tmp_name'], $caminho_destino . $arquivo);
            $imagemRepositorio->salvarImagem($imagem, $lastId);
        }
        else
        {
            continue;
        }
    
      
    }   
       
  

    header("Location: ./adicionarDecoracoes.php");


}


