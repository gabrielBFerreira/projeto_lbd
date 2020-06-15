<?php require('components/top.php'); ?>

<p class = "botao_cadastro">Cadastro</p>

<form id="form_cadastro" action="#" method=post>

<label for="Nome" class="label_cadastro">Nome</label>
<input type="text" name="Nome" class="campo_cadastro" required> <br><br>

<label for="Email" class="label_cadastro">Email</label>
<input type="email" name="Email" class="campo_cadastro" required> <br><br>

<label for="Rua" class="label_cadastro">Rua</label>
<input type="text"name="Rua" class="campo_cadastro" required> <br><br>

<label for="Cidade" class="label_cadastro">Cidade</label>
<input type="text" name="Cidade" class="campo_cadastro" required> <br><br>

<label for="Estado" class="label_cadastro">Estado</label>
<input type="text" name="Estado" class="campo_cadastro" required> <br><br>

<label for="Senha" class="label_cadastro">Senha</label>
<input type="password"  name="Senha" class="campo_cadastro" required> <br><br>

<label for="Confirma Senha" class="label_cadastro">Confirma senha</label>
<input type="password" name="Confirma Senha" class="campo_cadastro" required> <br><br>

<input type="reset" name="Redefinir" class="botao_cadastro" value="Redefinir">
<input type="submit" name="Confirmar" class="botao_cadastro" value="Confirmar">

</form>

<?php require('components/bottom.php'); ?>