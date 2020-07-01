<?php
    require('components/top.php');

    require 'backend/connection.php';

    $query = 'select id, nome from produto';
    $result = mysqli_query($connection, $query);
?>

<p>Gerenciar Produtos</p>

<form  action="#" method=post>
<label for="nome">Nome</label>
<input type="text" name="nome"  required> 

<label for="categoria">Categoria</label>
<input type="text" name="categoria"  required> <br><br>

<label for="fabricante">Fabricante</label>
<input type="text" name="fabricante" required>

<label for="descricao">Descrição</label>
<input type="text" name="descricao" required> <br><br>

<label for="preco">Preço do produto</label>
<input type="number" name="preco" required> <br><br>

<label for="campo_img">Adicionar foto</label>
<input id="foto" type="file" name="campo_img"><br><br>
<input type="submit" name="Cadastrar" class='botao' value="Cadastrar Produto"> 
<a href='gerenciar_categoria.php' class='botao'>Criar categoria</a>
<br><br>

<select name="selecione">
    <option value="">Selecione um produto</option>
    <?php
        while($produto = mysqli_fetch_array($result)) {
            echo "<option value=".$produto['id'].">".$produto['nome']."</option>";
        }
    ?>
</select>

<br><br>

<input type="submit" name="Alterar Produto"  value="Alterar produto">
<input type="submit" name="Excluir Produto"  value="Excluir Produto">


</form>

<?php require('components/bottom.php');?>