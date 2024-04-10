<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU</title>
    <link rel="stylesheet" href="style_menu.css">
</head>
<body>
    <section>
    <h1>Entrou</h1>
    <div>
        <?php
        session_start();
         if($_SESSION['UsuarioNivel'] == 'USER'){
            ?>
        <a href="relatorio_user.php"><button name="relatorio.user" >Relatório</button></a>
        <a href="logout.php"><button name ="sair">Sair</button></a>
     <?php    
    }elseif($_SESSION['UsuarioNivel'] == 'ADM'){
        ?>
        <a href="relatorio_adm.php"><button name="relatorio.user" >Relatório</button></a>
        <a href="logout.php"><button name ="sair">Sair</button></a>
        <?php
    }else echo "[ERRO] Faça o Login primeiro!";
    ?>
    </div>
</section>
</body>
</html>