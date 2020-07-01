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

    <label for="categoria" class="label_cadastro">Selecionar categoria</label>
    <select name="categoria">
        <option value="">Selecione uma categoria</option>
        <?php
            while($categoria = mysqli_fetch_array($result)) {
                echo "<option value=".$categoria['id'].">".$categoria['nome']."</option>";
            }
        ?>
    </select>
    <br>
    <br>
    <input type="submit" value="Alterar categoria" class = "botao_cadastro">
    <input type="submit" name="Excluir Categoria"  value="Excluir Categoria" class = "botao_cadastro">

</form>
<?php require('components/bottom.php');?>