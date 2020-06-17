<?php require('components/top.php');?>
<p class = "botao_cadastro">Gerenciar Categoria</p>

<form id="form_categoria" action="#" method=post>

<label for="Nome" class="label_cadastro">Nome</label>
<input type="text" name="Nome" class="campo_cadastro" required> <br><br>
<input type="submit" name="Criar Categoria"  value="Criar Categoria" class = "botao_cadastro"><br><br>

<label for="Selecionar" class="label_cadastro">Selecionar Cadastro</label>
<input type="text" name="Selecionar Categoria" class="campo_cadastro" required> <br><br>

<input type="submit" name="Alterar Categoria"  value="Alterar Categoria" class = "botao_cadastro">
<input type="submit" name="Exluir Categoria"  value="Excluir Categoria" class = "botao_cadastro">
</form>
<?php require('components/bottom.php');?>