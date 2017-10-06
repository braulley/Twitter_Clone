<?php

     session_start();
     require_once('db_class.php');
    
    $id_usuario = $_SESSION['id_usuario'];
    $deixar_seguir_id_usuario = $_POST['deixar_seguir_id_usuario'];
    
    if($id_usuario == '' || $deixar_seguir_id_usuario == ''){
        die();
    }
    
    
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "DELETE FROM usuarios_seguidores WHERE id_usuario = $id_usuario AND seguido_usuario = $deixar_seguir_id_usuario";
    //executar a query
    mysqli_query($link, $sql);
?>