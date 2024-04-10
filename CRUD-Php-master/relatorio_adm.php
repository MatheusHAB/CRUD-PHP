<?php include('conexao.php');
$quey = "SELECT login FROM usuario";
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="styleRelatorio.css">
    <h1>Procure pelo Nome</h1>
    
</head>
<body>
    <div className="container">
        <form action=# method=POST>
            <input type=text name=user>
            <br>
            <input type="submit" name=botao value=procurar>
            <br>
        </form>
</div>
        <?php if (@$_REQUEST['botao']) { ?>
            <table>
                <tr>
                    <th scope="col">C&oacute;d</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Nivel</th>
                    <th scope="col">Edição</th>
                </tr>
                <?php
                $login = $_POST['user'];
                $query = "SELECT *
              FROM usuario
              WHERE id > 0 ";
                $query .= ($login ? " AND login LIKE '%$login%'": "");
                $query .= " ORDER by id";
                $result = mysqli_query($con, $query);
                while ($coluna = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <th width="5%"> <?php echo $coluna['id']; ?> </th>
                        <th width="30%"> <?php echo $coluna['login']; ?> </th>
                        <th width="15%"> <?php echo $coluna['senha'];  ?></th>
                        <th width="12%"> <?php echo $coluna['nivel']; ?></th>
                        <td>
                            <a href="atualizar_ADM.php?pag=cliente&id=<?php echo $coluna['id']; ?>"><button>Editar</button></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        <?php
        }
        ?>
</body>
</html>