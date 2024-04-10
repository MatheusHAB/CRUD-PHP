<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório da Conta</title>
    <link rel="stylesheet" href="styleRelatorio.css">
    <?php include ('conexao.php');  ?>
    
</head>
<body>
    <h1 >RELATORIO DE CONTA - <?php require('verifica.php'); echo $_SESSION["nome_usuario"]; ?></h1><br>
    <?php     
?>
    <table width='95%' border="1" align="center">
        <tr bgcolor="#FFFFFF">
            <th width='30%'>LOGIN</th>
            <th width='30%'>SENHA</th>
            <th width="30%">EDIÇÃO</th>
        </tr>
        <?php
            
            $id = $_SESSION['id_usuario'];
            $login = $_SESSION['nome_usuario'];
            $senha = $_SESSION['senha_usuario'];

            $query = "SELECT * FROM usuario WHERE id > 0 AND id LIKE '$id' ORDER by id";
            $result_query = mysqli_query($con, $query);
            
            while($coluna=mysqli_fetch_array($result_query)){
        ?>
            <tr bgcolor="#FFFFFF">
                <th width="30%"><?php echo $coluna['login'];?></th>
                <th width="30%"><?php echo $coluna['senha'];?></th>
                <td>
                    <a href="atualizar_user.php?pag=cliente&id=<?php echo $coluna['id']; ?>"><button>Editar</button></a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>
