<?php

     session_start();
     require_once('db_class.php');
    
    $id_usuario = $_SESSION['id_usuario'];
    $seguir_id_usuario = $_POST['seguir_id_usuario'];
    
    if($id_usuario == '' || $seguir_id_usuario == ''){
        die();
    }
    
    
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "INSERT INTO usuarios_seguidores (id_usuario, seguido_id_usuario) VALUES ('$id_usuario', '$seguir_id_usuario')";
    //executar a query
    mysqli_query($link, $sql);
?>