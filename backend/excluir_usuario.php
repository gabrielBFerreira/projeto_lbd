<?php
    session_start();
    $id = $_SESSION['id'];
    
    require "connection.php";

    if($_SESSION['tipo'] == 'cliente'){
        $query = 'delete from cliente where id = '.$id;
        $result = mysqli_query($connection, $query);    
    }

    else if($_SESSION['tipo'] == 'admin'){
        $query = 'delete from administrador where id = '.$id;
        $result = mysqli_query($connection, $query);
    }
   
    unset($_SESSION['login']);
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    unset($_SESSION['tipo']);

    header("Location: ../index.php");
?>