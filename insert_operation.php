<?php
    require "database.php";
    require "dao/UsuarioDAOMysql.php";

    $usuarioDao = new UsuarioDAOMysql($pdo);
    
    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(INPUT_POST, 'email');
    $telefone = filter_input(INPUT_POST, 'telefone');

    if ($nome && $email && $telefone){
        
        if($usuarioDao->findByEmail($email) === false){
            $novoUsuario = new Usuario();
            $novoUsuario->setNome($nome);
            $novoUsuario->setEmail($email);
            $novoUsuario->setTelefone($telefone);
    
            $usuarioDao->add($novoUsuario);
            header("Location: index.php");
    
        } else {
            header("Location: noemail=true");
            exit;
        }
    
    }
