<?php 
		
		$id=$_GET["indice"];
		//$cliente=$_GET["id_cliente"];

		require"conexao.php";
		
		$sql="SELECT nome_produto, preco from tblproduto WHERE cod_produto = $id";
		$resultado = mysqli_query($conexao, $sql);
		$linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

		$nome = $linha["nome_produto"];
		$valor = $linha["preco"];
		
		$sql1 = "INSERT INTO tblpedido (codCliente, nome, valor, dthr, codProduto) VALUES ('$cliente', '$nome', '$valor', NOW(), '$id');";
		$resultado1 = mysqli_query($conexao, $sql1);
		
		echo "<h1 id='ttl'>Compra realizada com sucesso!</h1>";

		$sql2 = "SELECT * from tblpedido order by codigoPedido DESC;";
		$resultado2 = mysqli_query($conexao, $sql2);
		$linha = mysqli_fetch_array($resultado2, MYSQLI_ASSOC);

		echo "<div id='ttl'>";
		echo "<br>";
		echo "<h2>Produto comprado: " .$linha["nome"]."</h2>";
		echo "<h2>Preço: R$ " .$linha["valor"]. ",00</h2>";
		echo '</div>';

		mysqli_close($conexao);

		?>