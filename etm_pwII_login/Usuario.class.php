<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    function conecta()
    {
        $dsn = "mysql: dbname=etimlogin;=lacalhost";
        $User = "root";
        $pass = "";

        try{
        $this->pdo = new PDO($dsn,$User,$pass);
            return true;
        }catch(\Throwable $th){
            echo "Problema $th";
            return false;
        }
    }
    function inserirUsuario($nome,$email,$senha)
    {
        $sql = "INSERT INTO usuario SET nome = :n, email = :e, senha = :s";
        $stnt = $this->pdo->prepare($sql);
        $stmt->bindValue(":n" $nome);
        $stmt->bindValue(":e" $email);
        $stmt->bindValue(":s" $senha);

        return $stnt->execute();
    }
    public function checkUser($email)
    {
        $sql = "SELECT *FROM usuario WHERE email = :e";
        $stmt = $this ->pdo-> prepare($sql);
        $stmt->bindValue(" :e", $email);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
    public function checkPass($email, $senha)
    {
        $sql = "SELECT *FROM usuario WHERE email = :e AND senha = :s";
        $stmt = $this ->pdo-> prepare($sql);
        $stmt->bindValue(" :e", $email);
        $stmt->bindValue(" :s", md5($senha));
        $stmt->execute();

        return $stmt->rowCount() > 0
    }
    public function listarUsuarios()
    {
        $sql = "SELECT * FROM usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt -> execute();
        if ($stmt->rowCount() > 0){
            return $stmt->fetchAll();
        }else{
            return array();
        }
    }
    public function listarUsuarios($id)
    {
        $sql = "SELECT *FROM usuario WHERE id = :i";
        $stmt = $this->pdo->prepare($sql);
        $stmt ->bindValue(":i", $id);

        $stmt ->execute();
        if ($stmt->rowCount() > 0){
            return $stmt->fetch();
        }else{
            return array();
        }
    }
}