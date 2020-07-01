<?php require('components/top.php');
    if (!isset($_SESSION['tipo']) or ($_SESSION['tipo'] != 'admin')){
        $_SESSION['mensagem'] = 'Acesso negado';
        header("Location: ../login.php");
    }

    require 'backend/connection.php';

    $query = 'select id, nome from categoria';
    $result = mysqli_query($connection, $query);
?>
<p style='font-size:120%'>Gerenciar categoria</p>

<form id="form_categoria" action="backend/cadastro_categoria.php" method="post">

    <label for="nome" class="label_cadastro">Nome</label>
    <input type="text" name="nome" class="campo_cadastro" required> <br><br>
    <input type="submit" value="Criar categoria" class = "botao_cadastro"><br><br>

    <select name="categoria" id='categoria'>
        <option value="">Selecionar categoria</option>
        <?php
            while($categoria = mysqli_fetch_array($result)) {
                echo "<option value=".$categoria['id'].">".$categoria['nome']."</option>";
            }
        ?>
    </select>
    <br>
    <br>
    <input type="submit" value="Alterar categoria" class = "botao_cadastro">
    <a href='backend/excluir_categoria.php' class='botao_cadastro'>Excluir categoria</a>
</form>
<?php require('components/bottom.php');?>