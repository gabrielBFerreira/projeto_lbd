<?php
    session_start();
 
    $login = $_POST['email'];
    $senha = $_POST['senha'];
 
    require "connection.php";
    
    $query_cliente = "select * from cliente where email = '$login' AND senha = PASSWORD('$senha');";
    $query_admin = "select * from administrador where email = '$login' AND senha = PASSWORD('$senha');";
    
    $res_cliente = mysqli_query($connection, $query_cliente); 
    $res_admin = mysqli_query($connection, $query_admin); 

	if ($linha = mysqli_fetch_assoc($res_cliente)) {
        
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $linha["id"];
        $_SESSION['nome'] = $linha["nome"];
        $_SESSION['tipo'] = 'cliente';
        
        header("Location: ../area_usuario.php");

    } elseif ($linha = mysqli_fetch_assoc($res_admin)) {
        
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $linha["id"];
        $_SESSION['nome'] = $linha["nome"];
        $_SESSION['tipo'] = 'admin';

        header("Location: ../area_usuario.php");

    } else {
        
        $_SESSION['mensagem'] = 'Acesso negado';
        
        header("Location: ../login.php");

    }
?>