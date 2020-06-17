<?php
    $connection = mysqli_connect("localhost","root","","loja_projeto_lbd");
    if (!$connection)
        echo("Conexão falhou: " . mysqli_connect_error());
?>