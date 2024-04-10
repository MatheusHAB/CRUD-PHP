<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Usuário</title>
    <link rel="stylesheet" href="./styleatuAdm.css">
    <?php include('conexao.php')?>
</head>
<body>
    <section>
    <h2>Atualizar Usuário</h2>
    <form action="#" method="POST">
        <label for="id">ID do Usuário:</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="login">Novo Login:</label>
        <input type="text" id="login" name="login" required><br><br>

        <label for="senha">Nova Senha:</label>
        <input type="text" id="senha" name="senha" required><br><br>

        <label for="nivel">Novo Nível:</label>
        <input type="text" id="nivel" name="nivel" required><br><br>

        <input type="submit" name="botaoAtualizar" value="Atualizar"><br>
        <input type="submit" name="botaoExcluir" value="Excluir"><br>
        <a href="menu.php"><button>Sair</button></a>
    </form>
</section>

<?php
include ('conexao.php');
session_start();

if(@$_REQUEST['botaoAtualizar']){
    if($_SESSION['UsuarioNivel'] == 'ADM'){
        $id = $_POST['id'];
        $login = $_POST['login'];
        $senha = md5($_POST['senha']);
        $nivel = $_POST['nivel'];

        $query_atualiza = "UPDATE usuario SET login='$login',
                            senha='$senha', nivel='$nivel' WHERE id='$id' ";


        $result_atualiza = mysqli_query($con, $query_atualiza);
        if($result_atualiza)echo "<script> alert('Usuário atualizado com sucesso!');top.location.href='menu.php'; </script>";
        else echo "<script> alert('[ERRO] Erro ao atualizar o usuário.');top.location.href='menu.php'; </script>";

    }else echo '[ERRO] Você não tem permissão para alterar usuários.';
}elseif(@$_REQUEST['botaoExcluir']){
    if($_SESSION['UsuarioNivel'] == 'ADM'){
        $id = $_POST['id'];
        
        $query_excluir = "DELETE FROM usuario WHERE id = '$id' ";

        $result_excluir = mysqli_query($con, $query_excluir);
        if($result_excluir) echo "<script>alert('Registro excluido com sucesso');top.location.href='menu.php';</script>";
        else echo "<script>alert('[ERRO] Não foi possivel excluir o registro');top.location.href='menu.php';</script>";
    
    }
}


?>
</body>
</html>
