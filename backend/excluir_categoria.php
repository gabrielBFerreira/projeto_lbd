<?php
    session_start();
    extract($_GET);
    
    require "connection.php";

    $query = 'delete from categoria where id = '.$id;
    $result = mysqli_query($connection, $query);    
    
    header("Location: ../area_usuario.php");
?>