<?php
require "Usuario.class.php";
$usuario = new Usuario();
$con = $usuario->conecta();

if($con){
    $user = $usuario->inserirUsuario("Mateus","Mateus@gmail.com",1234);
    if($con){
        echo "Usuario imserido!"

    }

    else{
        echo "Erro, tente novamente!"
    }
}

else{
    echo "Banco indisponivel, reinicie!"
}