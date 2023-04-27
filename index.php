<?php
    require "database.php";
    require "dao/UsuarioDAOMysql.php";

    $userDAO = new UsuarioDAOMysql($pdo);
    $lista = $userDAO->findAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud - oop</title>
</head>
<body>
    <a href="template/insert_template.php">INSERIR DADOS</a>
    <h2>MOSTRANDO DADOS</h2>
    <table border="1">
        <tr>
            <td>NOME</td>
            <td>EMAIL</td>
            <td>TELEFONE</td>
            <td>Opções</td>
        </tr>
        <tr>
        <?php foreach($lista as $usuario):?>
            <td><?=$usuario->getNome();?></td>
            <td><?=$usuario->getEmail();?></td>
            <td><?=$usuario->getTelefone();?></td>
            <td>
                <a href="template/update_template.php?id=<?=$usuario->getId();?>"> [ EDITAR ] </a>
                <a href="delete_operation.php?id=<?=$usuario->getId();?>"> [ ELIMINAR ] </a>
            </td>
        </tr><?php endforeach;?>
    </table>
</body>
</html>