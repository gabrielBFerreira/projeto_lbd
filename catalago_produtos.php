<?php require('components/top.php'); ?>

<?php
require"backend/connection.php";
	$cmd = "SELECT * from produto ORDER BY id ASC";
	$produtos = mysqli_query($connection,$cmd); 
	while ($produto = mysqli_fetch_array($produtos)) { 
		echo '<img src="'.$produto["foto"].'" height=293px width=223px/><br>';
        echo "Nome: ".$produto["nome"]."<br>";
		echo "Descrição: ".$produto["descricao"]."<br>";
        echo "Fabricante: ".$produto["fabricante"]."<br>";
        echo "Preço: R$ " . $produto["preco"]."<br>";
        echo "<a href='backend/carrinho.php?id=".$produto['id']."'><img src='img/carrinho.png' height=60px width=60px/></a>";
		echo "<br>";
		}
?>

<?php require('components/bottom.php');?>