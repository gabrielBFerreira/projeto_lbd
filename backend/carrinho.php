<?php
	session_start();

	$id=$_GET["id"];

	$quantidade = $_POST["quantidade"];

	require"connection.php";

	$sql = "SELECT * FROM produto where id=$id;";

	$resultado = mysqli_query($connection, $sql);

	$linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
	
	if (!isset($_SESSION["produto_pedido"])){
		$pedido = array();
	}else {
		$pedido = $_SESSION["produto_pedido"];
	}

	$pedido[] = $linha;
	//array_push($pedido, $quantidade);
	
	$_SESSION["produto_pedido"] = $pedido;
    
	header("Location: ../carrinho.php");
	
	

 ?>