<?php require('components/top.php');?>

<p>Gerenciar Produtos</p>

<form  action="#" method=post>
<label for="Nome">Nome</label>
<input type="text" name="Nome"  required> 

<label for="Categoria">Categoria</label>
<input type="text" name="Categoria"  required> <br><br>

<label for="Fabricante">Fabricante</label>
<input type="text" name="Fabricante" required>

<label for="Descricao">Descrição</label>
<input type="text" name="Descricao" required> <br><br>

<label for="Preco do Produto">Preço do Produto</label>
<input type="text" name="Preco do Produto" required> <br><br>

<label for="campo_img">Adcionar foto</label>
<input id="foto" type="file" name="campo_img" value="Adcionar Foto"><br><br>
<input type="submit" name="Cadastrar"  value="Cadastrar Produto"> 
<input type="submit" name="Criar Categoria"  value="Criar Categoria">
<br><br>
<select name="selecione">
<input type="submit" name="Alterar Produto"  value="Alterar produto">
<input type="submit" name="Excluir Produto"  value="Excluir Produto">


</form>

<?php require('components/bottom.php');?>