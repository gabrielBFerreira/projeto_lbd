<?php
    require('components/top.php');

    require "backend/connection.php";

    $usuario = null;

    if (isset($_SESSION['tipo']) and ($_SESSION['tipo'] == 'cliente')) {
        $query = "select * from cliente inner join telefone on cliente.id = telefone.cliente_id inner join endereco on cliente.id = endereco.cliente_id where cliente.id = ".$_SESSION['id'];
        $res = mysqli_query($connection, $query); 
        $usuario = mysqli_fetch_assoc($res);
    }
?>

<p style='font-size:120%'>Cadastro</p>

<form id="form_cadastro" action="backend/cadastro_usuario.php" method=post>

<label for="nome" class="label_cadastro">Nome</label>
<input type="text" name="nome" class="campo_cadastro" value="<?=$usuario['nome']?>" required> <br><br>

<label for="email" class="label_cadastro">Email</label>
<input type="email" name="email" class="campo_cadastro" value="<?=$usuario['email']?>" required> <br><br>

<label for="rua" class="label_cadastro">Rua</label>
<input type="text"name="rua" class="campo_cadastro" value="<?=$usuario['rua']?>" required> <br><br>

<label for="cidade" class="label_cadastro">Cidade</label>
<input type="text" name="cidade" class="campo_cadastro" value="<?=$usuario['cidade']?>" required> <br><br>

<label for="estado" class="label_cadastro">Estado</label>
<input type="text" name="estado" class="campo_cadastro" value="<?=$usuario['estado']?>" required> <br><br>

<label for="ddd" class="label_cadastro">DDD</label>
<input type="text" name="ddd" class="campo_cadastro" maxlength="3" value="<?=$usuario['ddd']?>" required> <br><br>

<label for="telefone" class="label_cadastro">Telefone</label>
<input type="text" name="telefone" class="campo_cadastro"maxlength="15" value="<?=$usuario['numero']?>" required> <br><br>

<label for="senha" class="label_cadastro">Senha</label>
<input type="password"  name="senha" id="senha" class="campo_cadastro" required> <br><br>

<label for="confirma_senha" class="label_cadastro">Confirma senha</label>
<input type="password" name="confirma_senha" id="confirma_senha" class="campo_cadastro" required> <br><br>

<input type="hidden" name="id" value="<?=$usuario['cliente_id']?>">

<input type="reset" class="botao_cadastro" value="Redefinir">
<input type="submit" class="botao_cadastro" value="Confirmar">

</form>

<script>
    var password = document.getElementById("senha")
    , confirm_password = document.getElementById("confirma_senha");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("As senhas não batem, favor digitar novamente");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>

<?php require('components/bottom.php'); ?>