<?php
    session_start();

    extract($_POST);

    require"connection.php";

    if ($id != null){

        $query = "update cliente set nome = '$nome', email = '$email', senha = PASSWORD('$senha') where id = ".$id;
        if ($result = mysqli_query($connection, $query)) {        
            $query_login = "select id from cliente where email = '$email' AND senha = PASSWORD('$senha')";
            $res_login = mysqli_query($connection, $query_login); 
            $linha = mysqli_fetch_assoc($res_login);
    
            $query_endereco = "update endereco set rua = '$rua', cidade = '$cidade', estado = '$estado', cliente_id = $linha[id]";
            print_r($query_endereco);
            $res_endereco = mysqli_query($connection, $query_endereco); 
    
            $query_telefone = "update telefone set ddd = '$ddd', telefone = '$telefone', cliente_id = $linha[id]";
            print_r($query_telefone);
            $res_telefone = mysqli_query($connection, $query_telefone);

            if ($linha) {
                
                $_SESSION['login'] = $email;
                $_SESSION['id'] = $linha["id"];
                $_SESSION['nome'] = $nome;
                $_SESSION['tipo'] = 'cliente';
                
                header("Location: ../area_usuario.php");
            }
        }
    } else {
        $query = "insert into cliente values (null, '$nome', '$email', PASSWORD('$senha'))";
        if ($result = mysqli_query($connection, $query)) {        
            $query_login = "select id from cliente where email = '$email' AND senha = PASSWORD('$senha')";
            $res_login = mysqli_query($connection, $query_login); 
            $linha = mysqli_fetch_assoc($res_login);
    
            $query_endereco = "insert into endereco values (null, '$rua', '$cidade', '$estado', $linha[id], null)";
            print_r($query_endereco);
            $res_endereco = mysqli_query($connection, $query_endereco); 
    
            $query_telefone = "insert into telefone values (null, '$ddd', '$telefone', $linha[id], null)";
            print_r($query_telefone);
            $res_telefone = mysqli_query($connection, $query_telefone); 

            if ($linha) {
                
                $_SESSION['login'] = $email;
                $_SESSION['id'] = $linha["id"];
                $_SESSION['nome'] = $nome;
                $_SESSION['tipo'] = 'cliente';
                
                header("Location: ../area_usuario.php");
            }
        }
    }
?>