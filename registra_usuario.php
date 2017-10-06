<?php

    require_once('db_class.php');

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $usuario_existe = false;
    $email_existe = false;

    //Verificar se o usuário existe
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    if($resultado_id = mysqli_query($link,$sql)){
       $dados_usuario =  mysqli_fetch_array($resultado_id);
       if(isset($dados_usuario['usuario'])){
           $usuario_existe = true;
       }
       else{
           echo 'Usuário não Cadastrado.Pode cadastrar.';
       }
    }else{
        echo 'Erro ao tentar localizar o registro do usuário.';
    }
    //Verificar se o email existe
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    if($resultado_id = mysqli_query($link,$sql)){
       $dados_usuario =  mysqli_fetch_array($resultado_id);
       if(isset($dados_usuario['email'])){
           $email_existe = true;
       }
       else{
           echo 'Email não Cadastrado.Pode cadastrar.';
       }
    }else{
        echo 'Erro ao tentar localizar o registro de Email.';
    }

    if($usuario_existe || $email_existe){

        $retorno_get = '';
        if($usuario_existe){
            $retorno_get.="erro_usuario=1&";
        }

        if($email_existe){
            $retorno_get.="erro_email=1&";
        }
        header('Location: inscreva-se.php?'.$retorno_get);
        die();
    }
    
        $sql = "INSERT INTO usuarios (usuario, email, senha) VALUES ('$usuario', '$email', '$senha')";

        //executar a query
        if(mysqli_query($link, $sql)){
            echo "Usuário registrado com sucesso!";
        }else{
            echo "Erro ao registrar o usuário!";
        }
?>