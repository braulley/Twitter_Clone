<?php

    session_start();
    unset($_SESSION['usuario']);
    unset($_SESSION['email']);
    unset($_SESSION['id_usuario']);
    echo 'Esperamos você em breve!!!';

?>