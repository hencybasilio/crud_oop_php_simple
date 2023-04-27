<?php

class Usuario {
    private $id;
    private $nome;
    private $email;
    private $telefone;

    public function getId(){
        return $this->id;
    }

    public function setId($i){
        $this->id = trim($i);
    }
    public function getNome(){
        return $this->nome;
    }

    public function setNome($n){
        $this->nome = ucwords(trim($n));
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($e){
        $this->email = strtolower($e);
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function setTelefone($tel){
        $this->telefone = $tel;
    }
}


interface UsuarioDAO {
    public function add(Usuario $u);
    public function findAll();
    public function findByEmail($email);
    public function findById($id);
    public function updateUsuario(Usuario $u);
    public function delete($id);
}