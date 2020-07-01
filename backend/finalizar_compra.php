<?php 		
    session_start();

    print_r($_SESSION);

    if ($_SESSION['tipo'] != 'cliente') {
      
      $_SESSION['mensagem'] = 'Acesso negado';
      header("Location: ../login.php");

    } else {
      $id_cliente = $_SESSION["id"];
      $valor_total = $_POST["valor_total"];

      require"connection.php";
      
      //Abre pedido
      $query_pedido = "INSERT INTO pedido (data, valor_total, cliente_id) VALUES (NOW(), $valor_total, $id_cliente);";
      $res_pedido = mysqli_query($connection, $query_pedido);
      
      //Busca dados do pedido aberto
      $busca_pedido = "SELECT * FROM pedido ORDER BY id DESC LIMIT 1";
      $res_busca = mysqli_query($connection, $busca_pedido); 
      $pedido = mysqli_fetch_assoc($res_busca);
      $id_pedido = $pedido['id'];

      foreach ($_SESSION["produto_pedido"] as $produto) {
        $query_produtos = "INSERT INTO produto_pedido (quantidade, produto_id, pedido_id) VALUES (".$produto['quantidade'].", ".$produto['id'].", $id_pedido);";
        $res_produtos = mysqli_query($connection, $query_produtos);
      }
      
      unset($_SESSION["produto_pedido"]);

      header("Location: ../area_usuario.php");
    }

	?>