<?php require('components/top.php');
    
    if (!isset($_SESSION["produto_pedido"])){

        echo "Carrinho vazio.";

    }else {
        $valor_total=0;
        echo "<form action='backend/finalizar_compra.php' method='get'>";
		foreach($_SESSION["produto_pedido"] as $indice => $produto) {
            echo '<img src="'.$produto["foto"].'" height=293px width=223px/><br>';
            echo "Nome: ".$produto["nome"]."<br>";
            echo "Descrição: ".$produto["descricao"]."<br>";
            echo "Fabricante: ".$produto["fabricante"]."<br>";
            echo "Preço: R$ ".$produto["preco"]."<br>";
            echo "Quantidade: <input type='number' name='qtd_prod_".$indice."'onkeyup='calculo()' value='1' min='1'><br>";
            //echo $_SERVER['REQUEST_URI'];
            //$parts = parse_url($_SERVER['REQUEST_URI']);
            //$parts['query'];
            //parse_str($parts['query'], $query);
            //print_r($query);
            //$valor_total=$valor_total+($produto["preco"]*$query["qtd_prod_".$indice]);
            echo "<a href='backend/excluir_item_carrinho.php?indice=".$indice."'><img src='img/lixeira.png' height=60px width=60px/></a>";
            echo "<br>";

            echo "<script> 
                function calculo() {
                    var valor = 0;
                    var num = document.getElementById('qtd_prod_".$indice."');
                    valor = valor + (".$produto["preco"]."*num.value);
                    alert('ze troxa');
                }
                </script>";
            }

            echo "Valor Total: ".$valor_total;
            echo "<input type='submit' value='Finalizar Compra'>";
            echo "</form>";
    }

require('components/bottom.php');?>