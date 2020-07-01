<?php require('components/top.php'); ?>

<?php
	require "backend/connection.php";

	extract($_GET);

	if(isset($pesquisa)){
		$query = "select * from produto where nome like '%".$pesquisa."%'";
	} else {
		$query = "select * from produto ORDER BY id ASC";
	}
		$produtos = mysqli_query($connection,$query); 
		while ($produto = mysqli_fetch_array($produtos)) {
			echo "<form action='backend/carrinho.php?id=".$produto['id']."' method='post'>";
				echo '<table class="face"><tr><td>';
					echo '<img src="'.$produto["foto"].'" height=223px width=223px/>';
				echo '</td><td>';
					echo "Nome: ".$produto["nome"]."<br>";
					echo "Descrição: ".$produto["descricao"]."<br>";
					echo "Fabricante: ".$produto["fabricante"]."<br>";
					echo "Preço: R$ " . $produto["preco"]."<br>";
					echo "Quantidade: <input type='number' name='qtd_prod' id='qtd_prod' value='1' min='1'><br>";
				echo '<td>';
					echo "<input type='image' src='img/carrinho.png' height=60px width=60px/>";
				echo '</td>';
				echo '</td></tr></table>';
			echo "</form>";
			echo "<br>";
		}
?>

<?php require('components/bottom.php');?>