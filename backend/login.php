<?php
    session_start();
 
    $login = $_POST['login'];
    $senha = $_POST['senha'];
 
    require "connection.php";
    
    $query_cliente = "select * from cliente where email = '$login' AND senha = '$senha';";
    $query_admin = "select * from administrador where email = '$login' AND senha = '$senha';";
 
    $res1 = mysqli_query ($connection, $query_cliente);
    $res2 = mysqli_query ($connection, $query_admin);
 
    if ($registro = mysqli_fetch_assoc($res1)){
        
        $_SESSION['logado'] = $login;
 
        header("Location: area_cliente.php");
        
    } else if ($registro = mysqli_fetch_assoc($res2)){
 
        $_SESSION['logado'] = $login;
 
        header("Location: area_admin.php");
 
    } else {
 
        $_SESSION['mensagem'] = 'Acesso negado';
    
        header("Location: ../login.php");
    
    }
?>