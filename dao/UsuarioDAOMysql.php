<?php
require 'Usuario.php';

class UsuarioDAOMysql implements UsuarioDAO
{

    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function add(Usuario $u)
    {
        $query = $this->pdo->prepare("INSERT INTO tbl_people (nome, email, telefone) VALUES (:nome, :email, :tel)");

        $query->bindValue(":nome", $u->getNome());
        $query->bindValue(":email", $u->getEmail());
        $query->bindValue(":tel",  $u->getTelefone());
        $query->execute();

        $u->setId($this->pdo->lastInsertId());
        return $u;
    }
    public function findAll()
    {
        $array = [];
        $query = $this->pdo->query("SELECT * FROM tbl_people");
        $query->execute();
        if ($query->rowCount() > 0) {
            $data = $query->fetchAll();

            foreach ($data as $item) {
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setNome($item['nome']);
                $u->setEmail($item['email']);
                $u->setTelefone($item['telefone']);
                $array[] = $u;
            }
        }
        return $array;
    }
    public function findById($id) {
        $sql = $this->pdo->prepare("SELECT * FROM tbl_people WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        $linha = $sql->rowCount();
        if ($linha === 1) {
            $item = $sql->fetch(PDO::FETCH_ASSOC);
            $usuario = new Usuario();
            $usuario->setNome($item['nome']);
            $usuario->setEmail($item['email']);
            $usuario->setTelefone($item['telefone']);
            return $usuario;
        } else {
            return false;
        }
    }
    public function findByEmail($email) {
        $sql = $this->pdo->prepare("SELECT * FROM tbl_people WHERE email = :email LIMIT 1");
        $sql->bindValue(":email", $email);
        $sql->execute();
        $linha = $sql->rowCount();
        if ($linha === 1) {
            return true;
        } else {
            return false;
        }
    }
    public function updateUsuario(Usuario $u) {
        $sql = $this->pdo->prepare("UPDATE tbl_people SET nome = :n, email= :e, telefone = :t WHERE id=:i");

        $sql->bindValue(":n", $u->getNome());
        $sql->bindValue(":e", $u->getEmail());
        $sql->bindValue(":t", $u->getTelefone());
        $sql->bindValue(":i", $u->getId());
        $sql->execute();
    }
    public function delete($id) {
        $usuario = new Usuario();
        $sql = $this->pdo->prepare("DELETE FROM tbl_people WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
}
