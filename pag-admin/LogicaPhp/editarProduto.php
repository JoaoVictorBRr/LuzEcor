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

     $img = ($_FILES['capa']['name']) ? $_FILES['capa']['name'] : $decoracaoRepositorio->getFotoCapa($id);
     $decoracao = new Decoracao(
         null,
         $_POST['Tema'], 
         $_POST['Descricao'], 
         $img,
         $fav, 
         null
     );
 
     $decoracaoRepositorio->atualiarDecoracoes($decoracao, $id);

     $contagemImagens = 0;

     while($_FILES['foto-'. $contagemImagens]['name']){
        $contagemImagens += 1;
     }
 
     for($i = 0; $i < $contagemImagens; $i += 1){
 
         if($_FILES['foto-'. $i]['name']){
             $imagem = new Imagem(
                 null,
                 null,
                 $_FILES['foto-'. $i]['name'],
                 null
             );
         }else{
             continue;
         }
     
         $arquivo = $_FILES['foto-'. $i];
 
         $caminho_destino = str_replace('\\', '/', __DIR__ . '../../imagensBanco/');
         move_uploaded_file($_FILES['foto-'. $i]['tmp_name'], $caminho_destino . $arquivo['name']);
         
         $imagemRepositorio->salvarImagem($imagem, $id);
     }   
        
    header("Location: ./EditarProduto.php?id=$id");
 
 
 }
 
