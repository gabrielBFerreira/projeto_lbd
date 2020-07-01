<?php
    require('components/top.php');

    require 'backend/connection.php';

    $query = 'select id, nome from produto';
    $result = mysqli_query($connection, $query);

    $query_cat = 'select id, nome from categoria';
    $result_cat = mysqli_query($connection, $query_cat);
?>

<p>Gerenciar Produtos</p>

<form action="backend/cadastro_produto.php" method=post enctype="multipart/form-data">
    <input type='hidden' name='id' value=''>
    <table class='face'>
        <tr>
            <td>
                <label for="nome">Nome</label>
            </td>
            <td>
                <input type="text" name="nome" required> 
            </td>
            <td>
                <label for="categoria">Categoria</label>
            </td>
            <td>
                <select name="categoria" id='categoria'>
                    <option value="">Selecionar categoria</option>
                    <?php
                        while($categoria = mysqli_fetch_array($result_cat)) {
                            echo "<option value=".$categoria['id'].">".$categoria['nome']."</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="fabricante">Fabricante</label>
            </td>
            <td>
                <input type="text" name="fabricante" required>
            </td>
            <td>
                <label for="descricao">Descrição</label>
            </td>
            <td>
                <textarea name="descricao" required></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label for="preco">Preço do produto</label>
            </td>
            <td>
                <input type="number" name="preco" step="0.01" required> <br><br>
            </td>
        </tr>
    </table>
    <label for="campo_img">Adicionar foto</label>
                    
    <input type="file" name="campo_img" class='botao'><br><br>
    <input type="submit" class='botao' value="Cadastrar produto"> 
    <a href='gerenciar_categoria.php' class='botao'>Gerenciar categoria</a>
    <br>
    <select name="selecione">
        <option value="">Selecione um produto</option>
        <?php
            while($produto = mysqli_fetch_array($result)) {
                echo "<option value=".$produto['id'].">".$produto['nome']."</option>";
            }
        ?>
    </select>
    <input type="submit" name="Alterar Produto"  class='botao' value='Alterar produto'>
    <a href='excluir_produto.php' class='botao'>Excluir produto</a>
    
</form>

<?php require('components/bottom.php');?>