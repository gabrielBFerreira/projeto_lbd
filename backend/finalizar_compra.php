<?php 		
    print_r($_POST);    
    
    session_start();

    if ($_SESSION['tipo'] != 'cliente') {

      $_SESSION['mensagem'] = 'Acesso negado';
        
      header("Location: ../login.php");

    }

    $id_cliente = $_SESSION["id"];
    $id_produto = $_POST["id_produto"];
    $quantidade = $_POST["quantidade"];
    $valor_total = $_POST["valor_total"];
    
    require"connection.php";
    
    //Abre pedido
    $query_pedido = "INSERT INTO pedido (data, valor_total, cliente_id) VALUES (CURDATE(), $valor_total, $id_cliente);";
    $res_pedido = mysqli_query($connection, $query_pedido);
    print_r($query_pedido);
    
    //Busca dados do pedido aberto
    $busca_pedido = "SELECT * FROM pedido ORDER BY id DESC LIMIT 1";
    $res_busca = mysqli_query($connection, $busca_pedido); 
    $pedido = mysqli_fetch_assoc($res_busca);
    $id_pedido = $pedido['id'];
    
    //Adiciona produtos ao pedido
    $query_produtos = "INSERT INTO produto_pedido (quantidade, produto_id, pedido_id) VALUES ($quantidade, $id_produto, $id_pedido);";
    $res_produtos = mysqli_query($connection, $query_produtos);
    
    //$linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

    //print_r($linha);

    /*$nome = $linha["nome_produto"];
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

    mysqli_close($conexao);*/
		?>