<?php
    session_start();

    extract($_POST);

    require"connection.php";

    if ($categoria != null){

        $query = "update categoria set nome = '$nome' where id = ".$categoria;
        $result = mysqli_query($connection, $query);
    } else {
        $query = "insert into categoria values (null, '$nome')";
        $result = mysqli_query($connection, $query);
    }

    header("Location: ../area_usuario.php");
?>