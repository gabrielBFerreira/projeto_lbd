<?php require('components/head.php'); ?>

<div id ="fininho">
    <p id="titulo">M. J. G. Instrumentos</p>
</div>

<div id ="fenomeno">

<h1 class="form">
 
 <?php
    session_start();
    
    if (isset($_SESSION['mensagem'])){
        echo $_SESSION['mensagem'];
    }else{
        echo 'Login';
    }
 ?>
 
 </h1><br> 

<form id="form_login" class="form" action="backend/login.php" method=post>
    <label  for="email">E-mail</label> <br>
    <input type="email" class="campo_form" name="email" required><br>

    <label for="senha">Senha</label><br>
    <input type="password" class="campo_form" name="senha" required><br><br>

    <input type="submit" name="entrar" class="botao" value="Entrar">
</form>

</div>

<?php require('components/bottom.php'); ?>