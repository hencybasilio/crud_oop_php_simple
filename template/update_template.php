<?php
require "../dao/UsuarioDAOMysql.php";
require "../database.php";

$usuario = false;

$id = filter_input(INPUT_GET, 'id');
$usuarioDao = new UsuarioDAOMysql($pdo);

if ($id) {
    $usuario = $usuarioDao->findById($id);
}

if ($usuario === false) {
    header("Location: ../index.php");
    exit;
}
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
    <h2>ACTUALIZAR DADOS</h2>
    <form action="../update_operation.php" method="POST">
        <input type="hidden" name="id" value="<?= $usuario->getId(); ?>">
        <p>
            <label for="">NOME: </label>
            <input type="text" name="nome" value="<?= $usuario->getNome(); ?>">
        </p>
        <p>
            <label for="">EMAIL: </label>
            <input type="email" name="email" value="<?= $usuario->getEmail(); ?>">
        </p>
        <p>
            <label for="">TELEFONE: </label>
            <input type="number" name="telefone" value="<?= $usuario->getTelefone(); ?>">
        </p>
        <p>
            <input type="submit">
        </p>
    </form>
</body>

</html>