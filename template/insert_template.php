<?php
    require "../dao/UsuarioDAOMysql.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <a href="../index.php">VOLTAR</a>
    <h2>INSERIR DADOS</h2>
    <form action="../insert_operation.php" method="post">
        <p>
            <label for="">NOME: </label>
            <input type="text" name="nome">
        </p>
        <p>
            <label for="">EMAIL: </label>
            <input type="email" name="email">
        </p>
        <p>
            <label for="">TELEFONE: </label>
            <input type="number" name="telefone">
        </p>
        <p>
            <input type="submit">
        </p>
    </form>
</body>
</html>