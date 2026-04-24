<?php

if(isset($_POST["nome"])){
$nome =$_POST["nome"];
$email =$_POST["email"];
$senha =$_POST["senha"];

print_r($_POST);

if ($nome==""||$email==""||$senha=="") {
    echo"insira algo va";
    }else{
        require "Usuario.class.php";
        $usuario = new Usuario();
        $con = $usuario->conecta();

        if($con){
            $user = $usuario->inserirUsuario($nome,$email,$senha);
            if($con){
                echo "Usuario inserido!";

            }

            else{
                echo "Erro, tente novamente!";
            }
        }

    } 
}



?>

<!DOCTYPE html>
<html lang="br-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="uuu.css">
    <link rel="stylesheet" href="Usuario.php">
    <title>Tela de Login</title>
</head>
<body>
    


    <div class="iiiii">

        <div class="ooooo">
            <h1>Digite o login</h1>

            <form action="" method="post">
            <label for="username">Nome de usuário:</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Senha:</label>
            <input type="password" id="senha" name="senha" required><br><br>

            <input type="submit" value="Criar Login">
            </form>
        </div>
    </div>
</body>    
</html>