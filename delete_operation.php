<?php

require "database.php";
require "dao/UsuarioDAOMysql.php";

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $usuarioDao = new UsuarioDAOMysql($pdo);
    $usuario = new Usuario();
    $usuarioDao->delete($id);
    header("Location: index.php");
}
