<?php require('components/top.php'); ?>

<?php
require"backend/connection.php";
	//$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
	$cmd = "SELECT * from produto ORDER BY id ASC";
	$produtos = mysqli_query($connection,$cmd); 
	//$total = mysqli_num_rows($produtos); 
	//$registros = 4; 
	//$numPaginas = ceil($total/$registros); 
	//$inicio = ($registros*$pagina)-$registros; 
    //$cmd = "SELECT * from tblproduto ORDER BY cod_produto ASC limit $inicio,$registros"; 
	//$produtos = mysqli_query($conexao,$cmd); 
    //$total = mysqli_num_rows($produtos); 
	while ($produto = mysqli_fetch_array($produtos)) { 
		echo '<img src="'.$produto["foto"].'" height=293px width=223px/><br>';
        echo "Nome: ".$produto["nome"]."<br>";
		echo "Descrição: ".$produto["descricao"]."<br>";
        echo "Fabricante: ".$produto["fabricante"]."<br>";
        echo "Preço: R$ " . $produto["preco"] . ",00<br>";
        echo "<a href='backend/carrinho.php?id=".$produto['id']."'><img src='img/carrinho.png' height=60px width=60px/></a>";
		echo "<br>";
		}
	//for($i = 1; $i < $numPaginas + 1; $i++) { 
    //echo "<a href='produtos.php?pagina=$i'>".$i."</a> "; 
    //} 
?>

<?php require('components/bottom.php');?>