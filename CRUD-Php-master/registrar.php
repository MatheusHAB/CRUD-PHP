<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section>
        <form action=# method='post'>
            <h1>Registro</h1>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="text" name='login'required>
                <label for="">Usuario</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="senha" required>
                <label for="">Insira a Senha</label>
            </div>
            
            <input type="submit" value="Registrar-se" name="botao">
            <div class="register">
                <p>Já possuo uma conta <a href="login.php">Entrar</a></p>
            </div>
        </form>
    </section>
    <?php
        include('conexao.php');
        if(@$_REQUEST['botao']){
            $login = $_POST['login'];
            $senha = md5($_POST['senha']);
            
            $insere = "INSERT into usuario (login, senha, nivel) VALUES ('{$_POST['login']}', '$senha', 'USER')";
            $result_insere = mysqli_query($con, $insere);

            if($result_insere) echo "<h2> Sucesso no cadastro</h2>";
            else echo 'ERRO';
        }
    
    ?>
</body>
</html>