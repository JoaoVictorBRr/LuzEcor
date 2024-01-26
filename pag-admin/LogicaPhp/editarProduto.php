<?php



require __DIR__ . "../../../src/conection.php";

 require __DIR__ . "../../../src/model/decoracao.php";
 require __DIR__ . "../../../src/repository/repositorioDecoracao.php";
 
 require __DIR__ . "../../../src/model/imagem.php";
 require __DIR__ . "../../../src/repository/repositorioImagem.php";

 $id = $_GET['id'];
 
 $decoracaoRepositorio = new DecoracaoRepositorio($pdo);
 $imagemRepositorio = new ImagemRepositorio($pdo);

 $listaImagem = $imagemRepositorio->listaImagem($id);


 
 if(isset($_POST['atualizar'])){
 
     $fav = ($_POST['favoritar'] == "Sim") ? 1 : 0;
     $imagens = [];

     $caminhoAtual = __DIR__;
     $umNivelAcima = dirname($caminhoAtual);

     $indiceAleatorio = rand(0, 1000);

     $img = ($_FILES['capa']['name']) ?  $indiceAleatorio . "-" . $_FILES['capa']['name'] : $decoracaoRepositorio->getFotoCapa($id);
     $decoracao = new Decoracao(
         null,
         $_POST['Tema'], 
         $_POST['Descricao'], 
         $img,
         $fav, 
         null
     );

     if($_FILES['capa']['name']){

        $destinoArquivoCapa = $umNivelAcima . "./imagensBanco/" . $decoracaoRepositorio->getFotoCapa($id);
        unlink($destinoArquivoCapa);

        $capa = $indiceAleatorio . "-" . $_FILES['capa']['name'];

        $caminho_destino_capa = str_replace('\\', '/', __DIR__ . '../../imagensBanco/');
        move_uploaded_file($_FILES['capa']['tmp_name'], $caminho_destino_capa . $capa);

     }

  

 
     $decoracaoRepositorio->atualiarDecoracoes($decoracao, $id);

     $contagemImagens = 0;

     while($_FILES['foto-'. $contagemImagens]['name']){
        $contagemImagens += 1;
     }
 
     for($i = 0; $i < $contagemImagens; $i += 1){
 
       
         $contadorDeImagensRepetidas = 0;

         $arquivo = $i . "-" . $_FILES['foto-'. $i]['name'];
         
  
         $destinoArquivo = $umNivelAcima . "./imagensBanco/" . $arquivo;

         for($j = 0; $j < 10; $j += 1){
            //Se tiver imagens repetidas adicionar um contador no nome +1

            if (file_exists("$destinoArquivo")){
                $arquivo = $j + 1 . "-" . $_FILES['foto-'. $i]['name'];
                $destinoArquivo = $umNivelAcima . "./imagensBanco/" . $arquivo;

                $contadorDeImagensRepetidas = $j;
                
             }
    
         }

         if($_FILES['foto-'. $i]['name']){
            $imagem = new Imagem(
                null,
                null,
                $arquivo,
                null
            );
        }else{
            continue;
        }


         
         $caminho_destino = str_replace('\\', '/', __DIR__ . '../../imagensBanco/');
         move_uploaded_file($_FILES['foto-'. $i]['tmp_name'], $caminho_destino . $arquivo);
                  
         $imagemRepositorio->salvarImagem($imagem, $id);
     }   
        
    header("Location: ./EditarProduto.php?id=$id");
 
 
 }
 
