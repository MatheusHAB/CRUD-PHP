<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styleatuUser.css">
    <title>Atualizar Usuário</title>
    
    <?php include('conexao.php')?>
</head>
<body>
    <section>
    <h2>Atualizar Senha/Login<?php require('verifica.php');?></h2>
    <form action="atualizar_user.php" method="POST">
        
        <label for="login">Novo Login:</label>
        <input type="text" id="login" name="login" required><br><br>

        <label for="senha">Nova Senha:</label>
        <input type="text" id="senha" name="senha" required><br><br>

        <input type="submit" name="botaoAtualizar" value="Atualizar"><br>
        <a href="menu.php"><button>Sair</button></a>
    </form>
</section>
<?php

if(@$_REQUEST['botaoAtualizar']){
    
        $id = $_SESSION["id_usuario"];
        $login = $_POST['login'];
        $senha = md5($_POST['senha']);
        

        $query_atualiza = "UPDATE usuario SET login='$login',
                            senha='$senha', nivel='USER' WHERE id='$id' ";

        $result_atualiza = mysqli_query($con, $query_atualiza);

        if($result_atualiza)echo 'Usuário atualizado com sucesso!';
        else echo '[ERRO] Erro ao atualizar o usuário.';
}
    

?>
</body>
</html>