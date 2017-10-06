<?php

     session_start();
     require_once('db_class.php');
    
    $texto_tweet = $_POST['texto_tweet'];
    $id_usario = $_SESSION['id_usuario'];
    
    if($texto_tweet == '' || $id_usario == ''){
        die();
    }
    
    
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "INSERT INTO tweet (id_usuario, tweet) VALUES ('$id_usario', '$texto_tweet')";
    //executar a query
    if(mysqli_query($link, $sql)){
       echo "Usuário registrado com sucesso!";
    }else{
       echo "Erro ao registrar o usuário!";
    }

?>