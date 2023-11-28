<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="./styles-admin/adicionarAdmin.css">

    <link rel="shortcut icon" href="../ImagensSite-LuzeCor/Luz e cor.png" type="image/x-icon" />
    <title>Iformações de contato - Admin</title>
</head>
<body>

    
    <header>
        <div class="categorias">
                    <a href="./adicionarInformacao.php"> <strong>Informações de contato</strong></a>
                    <a href="./adicionarDecoracoes.php"><strong>Adicionar Decorações</strong></a>
                    <a href="./adicionarParcerias.php"><strong>Parcerias</strong></a>
                    <a href="./verDecoracoes.php"><strong>Ver decorações</strong></a>
                    <a href="./verParcerias.php"><strong>Ver Parcerias</strong></a>
        </div>
    </header>
    
    <section>

       

        <form method="POST">
            <h2>EDITAR INFORMAÇÕES DE CONTATO</h2>

            <div class="inputs">
                <label for="Tema">Tema: </label>
                <input class="input-item" name="Tema" type="text">
            </div>

            <div class="inputs">
                <label for="Descricao">Descrição: </label>
                <input class="input-item" name="Descricao" type="text">
            </div>

            <div class="input_foto">
                <label for="foto">Adicionar foto: </label>
                <input class="input-item" name="foto" type="file">

                
            </div>

            <div class="input_foto_adicionadas">
            <p>Fotos Adicionadas: </p>
                
                <ul>
                    <li>nomeFoto.png</li>
                    <li>nomeFoto2.png</li>
                </ul>
            </div>

            <div class="inputs_favoritar">
                    <br>
                    <p>Favoritar:</p>
                    <br>
                    <input type="radio" id="fav_sim" name="favoritar" value="Sim">
                    <label for="fav_sim">Sim</label>
                    <br>
                    <input type="radio" id="fav_nao" name="favoritar" value="Nao">
                    <label for="fav_nao">Não</label>
                </div>
               
        <div class="button">
            <input class="button-item" class="button" name="cadastro" type="submit" value="Atualizar">
        </div> 

        </form>
       

    </section>



</body>
</html>