<?php
    session_start();
    
    unset($_SESSION['login']);
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    unset($_SESSION['tipo']);

    header("Location: ../index.php");
?>