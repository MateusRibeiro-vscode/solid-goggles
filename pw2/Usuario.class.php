<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;

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

    function inserirUsuario($nome,$email,$senha){
        $sql = "INSERT INTO usuario SET nome = :n, email = :e, senha = :s";
        $stnt = $this->pdo->prepare($sql);
        $stmt->bindValue(":n" ,$nome);
        $stmt->bindValue(":e" ,$email);
        $stmt->bindValue(":s" ,$senha) ;

        return $stnt->execute();
    }
}