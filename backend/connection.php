<?php
    $connection = mysqli_connect("localhost","root","","loja_projeto_lbd");
    
    mysqli_query($connection, "SET NAMES 'utf8'");
    mysqli_query($connection, 'SET character_set_connection=utf8');
    mysqli_query($connection, 'SET character_set_client=utf8');
    mysqli_query($connection, 'SET character_set_results=utf8');

    if (!$connection)
        echo("Conexão falhou: " . mysqli_connect_error());
?>