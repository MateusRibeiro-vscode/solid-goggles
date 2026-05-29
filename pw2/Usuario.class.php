<?php
class Usuario2{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    function conecta(){
        try{
        $dsn = "mysql:dbname=etimusuario;host=localhost";
        $User = "root";
        $dbpass = "";
        $this->pdo = new PDO($dsn,$User,$dbpass);
        
            //code...
            return true;
        }catch(\Throwable $th){
            echo "Problema $th";
            return false;
        }
    }

    function inserirUsuario2($nome,$email,$senha){
     
        $sql = "INSERT INTO usuario SET nome = :n, email = :e, senha = :s";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":n" ,$nome);
        $stmt->bindValue(":e" ,$email);
        $stmt->bindValue(":s" ,$senha) ;

        return $stnt->execute();
    }
    public function checkUser($email)
    {
        $sql = "SELECT *FROM usuario WHERE email = :e";
        $stmt = $this->pdo-:>prepare($sql);
        $stmt -> bindValue(":e", $email);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
    public function checkPass($email, $senha)
    {
        $sql = "SELECT *FROM usuario WHERE email = :e AND senha = :s";
        $stmt = $this->pdo-:>prepare($sql);
        $stmt -> bindValue(":e", $email);
        $stmt -> bindValue(":s", md5($senha));
        $stmt->execute();

        return $stmt ->rowCount() > 0;
    }
    
}