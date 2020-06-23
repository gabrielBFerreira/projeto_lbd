<?php 
    require('components/top.php'); 
    
    require "backend/connection.php";

    if ($_SESSION['tipo'] == 'cliente') {
        $query = "select * from cliente inner join telefone on cliente.id = telefone.cliente_id inner join endereco on cliente.id = endereco.cliente_id where cliente.id = ".$_SESSION['id'];
        //$query_pedidos = "select * from pedido inner join produto_pedido on pedido.id = produto_pedido.pedido_id inner join produto on produto.id = produto_pedido.produto_id where pedido.cliente_id = ".$_SESSION['id']." group by pedido.id";
        
        $query_pedidos = "select * from pedido where cliente_id = ".$_SESSION['id'];
        $res_pedidos = mysqli_query($connection, $query_pedidos);
    }
    else if ($_SESSION['tipo'] == 'admin')
        $query = "select * from administrador inner join telefone on administrador.id = telefone.administrador_id inner join endereco on administrador.id = endereco.administrador_id where administrador.id = ".$_SESSION['id'];
    else {
        $_SESSION['mensagem'] = 'Acesso negado';
        header("Location: ../login.php");
    }
        $res = mysqli_query($connection, $query); 
        $usuario = mysqli_fetch_assoc($res);
?>

    <p>Área do Usuário</p>
    
    Nome: <?php echo $usuario['nome']; ?><br>
    E-mail: <?php echo $usuario['email']; ?><br>
    Endereço: <?php echo $usuario['rua']; ?><br>
    Cidade: <?php echo $usuario['cidade']; ?><br>
    Estado: <?php echo $usuario['estado']; ?><br>
    Telefone: (<?php echo $usuario['ddd']; ?>) <?php echo $usuario['numero']; ?><br>
    <br>
    Pedidos:<br>
    <?php
        while ($pedido = mysqli_fetch_array($res_pedidos)) { 
            echo "<br>";

            echo "Código do pedido: ".$pedido["id"]."<br>";
            echo "Data: ".date('d/m/Y H:i:s', strtotime($pedido["data"]))."<br>";
            echo "Produtos:<br>";
            
            $query_produtos = "select * from produto_pedido inner join produto on produto_pedido.produto_id = produto.id where produto_pedido.pedido_id = ".$pedido['id'];
            $res_produtos = mysqli_query($connection, $query_produtos);
            
            while ($produto = mysqli_fetch_array($res_produtos)) {
                echo $produto["quantidade"]." ".$produto["nome"]."; ";
            }
            echo "<br>";

            echo "Valor: R$ ".$pedido["valor_total"]."<br>";
        }
    ?>

    <input type="reset" name="Alterar"  value="Alterar">
    <input type="submit" name="Excluir"  value="Excluir">

<?php require('components/bottom.php');?>