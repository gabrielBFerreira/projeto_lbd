<?php require('components/top.php');
    if (!isset($_SESSION["produto_pedido"])){
        echo "Carrinho vazio.";
    }else {
        $valor_total=0;
        echo "<form action='backend/finalizar_compra.php' method='post'>";
		foreach($_SESSION["produto_pedido"] as $indice => $produto) {
            echo '<table class="face"><tr><td>';
                echo '<img src="'.$produto["foto"].'" height=223px width=223px/><br>';
            echo '</td><td>';
                echo "Nome: ".$produto["nome"]."<br>";
                echo "Descrição: ".$produto["descricao"]."<br>";
                echo "Fabricante: ".$produto["fabricante"]."<br>";
                echo "Preço: R$ ".$produto["preco"]."<br>";
                echo "Quantidade: ".$produto["quantidade"]."<br>";
            echo '</td><td>';
                echo "<a href='backend/excluir_item_carrinho.php?indice=".$indice."'><img src='img/lixeira.png' height=60px width=60px/></a>";
            echo "</td></td></tr></table>";
            echo "<br>";
            
            $valor_total = $valor_total + $produto["preco"]*$produto["quantidade"]; 
        }
            if(isset($produto)) {
                echo "Valor Total: R$ ".number_format($valor_total, 2, ',', '.')."<br>";
                echo "<input type='hidden' name='id_produto' value='".$produto['id']."'>";
                echo "<input type='hidden' name='quantidade' value='".$produto['quantidade']."'>";
                echo "<input type='hidden' name='valor_total' value='".$valor_total."'>";
                echo "<br>";
                echo "<button id='finalizar_compra' class='botao'>Finalizar compra</button>";
            } else {
                echo "Carrinho vazio";
            }
            echo "<div id='modal_cartao' class='modal'>";
                echo "<div class='modal-content'>";
                    echo "<span class='close'>&times;</span>";
                    echo "<p>Insira dados de seu cartão</p>";
                    echo "<input type='text' id='campo_cartao' name='dados_cartao' required>";
                    echo "<input type='submit' value='Confirmar' class='botao'>";
                echo "</div>";
            echo "</div>";

            echo "</form>";
    }
?>

<script>
    $(document).ready(function(){
        $('#campo_cartao').mask('0000 0000 0000 0000');
    });

    var modal = document.getElementById("modal_cartao");

    var btn = document.getElementById("finalizar_compra");

    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<?php require('components/bottom.php');?>