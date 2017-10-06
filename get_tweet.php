<?php

    session_start();

    if(!$_SESSION['usuario']){
        header('Location: index.php?erro=1');
    }

    require_once('db_class.php');

    $id_usario = $_SESSION['id_usuario'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "SELECT  DATE_FORMAT(t.data_inclusao,'%d %b %y') AS data_inclusao_formatada, t.tweet, u.usuario FROM tweet AS t ";
    $sql.= " JOIN usuarios AS u ON (t.id_usuario = u.id)";
    $sql.="WHERE id_usuario = $id_usario ORDER BY data_inclusao DESC";
    
    $resultado_id = mysqli_query($link,$sql);

    if($resultado_id){

        while($registro = mysqli_fetch_array($resultado_id)){

            
            echo '<a href="#" class="list-group-item"';
                echo '<h4 class="list-group-item-heading">'.$registro['usuario'].' <small> - '.$registro['data_inclusao_formatada'].'</small></h4>';
                echo '<p class="list-group-item-heading">Nome <small> - '.$registro['tweet'].'</small></p>';
            echo '</a>';
        }

    }else{
        echo 'Erro na consulta de tweets no banco de dados!';
    }

?>