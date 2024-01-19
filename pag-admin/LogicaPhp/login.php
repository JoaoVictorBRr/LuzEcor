<?php

require __DIR__ . "../../../src/conection.php";

require __DIR__ . "../../src-admin/Model-admin/usuario.php";
require __DIR__ . "../../src-admin/repository-admin/repositorioUser.php";

$usuarioRepositorio = new UsuarioRepositorio($pdo);

if(isset($_POST['cadastro'])){ 
    if($usuarioRepositorio->getUsuario() == $_POST['user'] && $usuarioRepositorio->getSenha() == $_POST['senha'] ){
       $_SESSION['login'] = true;
       header('Location: adicionarDecoracoes.php');
    }else{
        echo "<script>alert('Senha ou usário errado, tente novamente');</script>";
    }
}
  