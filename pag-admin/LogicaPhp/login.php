<?php

require __DIR__ . "../../../src/conection.php";

require __DIR__ . "../../src-admin/Model-admin/usuario.php";
require __DIR__ . "../../src-admin/repository-admin/repositorioUser.php";

$usuarioRepositorio = new UsuarioRepositorio($pdo);

session_start();

if(isset($_POST['cadastro'])){ 
    if($usuarioRepositorio->getUsuario() == $_POST['user'] && $usuarioRepositorio->getSenha() == $_POST['senha'] ){
       $_SESSION['login'] = true;
       header('Location: adicionarInformacao.php');
       exit();
    }else{
        echo "<script>alert('Senha ou usário errado, tente novamente');</script>";
    }
}
  