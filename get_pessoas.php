<?php

    session_start();

    if(!$_SESSION['usuario']){
        header('Location: index.php?erro=1');
    }

    require_once('db_class.php');

    $id_usuario = $_SESSION['id_usuario'];
    $nome_pessoa =  $_POST['nome_pessoa'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "SELECT * FROM usuarios WHERE usuario LIKE '%$nome_pessoa%' AND id <> $id_usuario";
    
    $resultado_id = mysqli_query($link,$sql);

    if($resultado_id){

        while($registro = mysqli_fetch_array($resultado_id)){

            
            echo '<a href="#" class="list-group-item"';
                echo '<strong>'.$registro['usuario'].'</strong> <small> -' .$registro['email'].'</small>';
                echo '<p class="list-group-item-text pull-rigth">';
                    echo '<button type="button" class="btn btn-default btn_seguir" data-id_usuario="'.$registro['id'].'" > Seguir </button>';
                    echo '<button type="button" class="btn btn-primary btn_deixar_seguir" data-id_usuario="'.$registro['id'].'" > Deixar de Seguir </button>';                    
                    echo '<div class="clearfix"></div>';
                echo '</p>';
                echo '</a>';
        }

    }else{
        echo 'Erro na consulta de usuários no banco de dados!';
    }

?>