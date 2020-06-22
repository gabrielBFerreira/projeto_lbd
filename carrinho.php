<?php require('components/top.php');
    if (!isset($_SESSION["produto_pedido"])){
        echo "Carrinho vazio.";
    }else {
        $valor_total=0;
        echo "<form action='backend/finalizar_compra.php' method='post'>";
		foreach($_SESSION["produto_pedido"] as $indice => $produto) {
            echo '<img src="'.$produto["foto"].'" height=293px width=223px/><br>';
        
            echo "Nome: ".$produto["nome"]."<br>";
            echo "Descrição: ".$produto["descricao"]."<br>";
            echo "Fabricante: ".$produto["fabricante"]."<br>";
            echo "Preço: R$ ".$produto["preco"]."<br>";
            echo "Quantidade: ".$produto["quantidade"]."<br>";
        
            echo "<a href='backend/excluir_item_carrinho.php?indice=".$indice."'><img src='img/lixeira.png' height=60px width=60px/></a>";
            echo "<br>";
            
            $valor_total = $valor_total + $produto["preco"]*$produto["quantidade"]; 
        }

            if(isset($produto)) {
                echo "Valor Total: R$ ".number_format($valor_total, 2, ',', '.')."<br>";
                echo "<input type='hidden' name='id_produto' value='".$produto['id']."'>";
                echo "<input type='hidden' name='quantidade' value='".$produto['quantidade']."'>";
                echo "<input type='hidden' name='valor_total' value='".$valor_total."'>";
                echo "<input type='submit' value='Finalizar Compra'>";
            } else {
                echo "Carrinho vazio";
            }

            echo "</form>";
    }
?>
<?php require('components/bottom.php');?>