<?php
    session_start();
    $indice = $_GET["indice"];
	unset($_SESSION["produto_pedido"][$indice]);
	header("Location: ../carrinho.php");
?>