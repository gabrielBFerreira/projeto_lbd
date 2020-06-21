<?php require('components/top.php'); ?>

<?php
require"backend/connection.php";
	$cmd = "SELECT * from produto ORDER BY id ASC";
	$produtos = mysqli_query($connection,$cmd); 
	while ($produto = mysqli_fetch_array($produtos)) { 
		echo "<form action='backend/carrinho.php?id=".$produto['id']."' method='post'>";
        echo '<img src="'.$produto["foto"].'" height=293px width=223px/><br>';
        echo "Nome: ".$produto["nome"]."<br>";
		echo "Descrição: ".$produto["descricao"]."<br>";
        echo "Fabricante: ".$produto["fabricante"]."<br>";
		echo "Preço: R$ " . $produto["preco"]."<br>";
		echo "Quantidade: <input type='number' name='qtd_prod' id='qtd_prod' value='1' min='1'><br>";
        echo "<input type='image' src='img/carrinho.png' height=60px width=60px/>";
		echo "</form>";
		echo "<br>";

	}
?>

<?php require('components/bottom.php');?>