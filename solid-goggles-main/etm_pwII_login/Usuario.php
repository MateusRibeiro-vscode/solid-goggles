<?php
class Usuario{
    private $id;
    private $nome;
    private $emai;
    private $senha;

    function conecta(){
        $dsn = "mysql: dbname=etimusuario;=lacalhost";
        $User = "root";
        $pass = "";

        try{
            //code...
        $this->pdo = new PDOA($dsn,$User,$pass)
            return true;
        }catch(\Throwable $th){
            echo "Problema $th";
            return false
        }
    }

    function inserirUsuario($nome,$emai,$senha){
        $sql = "INSERT INTO usuario SET nome = :n, email = :e, senha = :s"
        $stnt = $this->pdo->prepare($sql);
        $stmt->bindValue(":n" $nome);
        $stmt->bindValue(":e" $emai);
        $stmt->bindValue(":s" $senha) 

        return $stnt->execute();
    }
}