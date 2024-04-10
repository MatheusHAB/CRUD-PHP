<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Primeiro treinamento</title>
</head>
<body>
    <section>
        <form action=# method='post'>
            <h1>Inicio</h1>
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
            <div class="forget">
                
                
            </div>
            <input type="submit" value="Entrar" name="botao">
            <div class="register">
                <p>Não possuo uma conta <a href="registrar.php">Registrar-se</a></p>
            </div>
        </form>
    </section>

    <?php
        session_start();
        include ('conexao.php');

        if(@$_REQUEST['botao']){
            $login = $_POST['login'];
            $senha = md5($_POST['senha']);

            $query = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha' ";
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result) > 0){
            while ($coluna=mysqli_fetch_array($result)) {
            $_SESSION["id_usuario"]= $coluna["id"]; 
            $_SESSION["nome_usuario"] = $coluna["login"]; 
            $_SESSION['senha_usuario'] = $coluna['senha'];
            $_SESSION["UsuarioNivel"] = $coluna["nivel"];

            // caso queira direcionar para páginas diferentes
            $niv = $coluna['nivel'];
            if($niv == "USER"){ 
                header("Location: menu.php"); 
                exit; 
            }
            
            if($niv == "ADM"){ 
                header("Location: menu.php"); 
                exit; 
            }
	    }
    }else echo "<script>alert('Usuário ou senha incorretos. Por favor, tente novamente.');</script>";
            
}

?>
</body>

</html>