<header>
    <p class = "titulo">
        M. J. G.<br>
        Instrumentos
    </p>
 
    <p class = "aviso_login">
        <?php
            session_start();
            if (isset($_SESSION['login']))
                echo "Bem-vindo(a),".$_SESSION['nome'].".<br><a href='logout.php'>Fazer Logout</a>.";
            else    
                echo "Bem-vindo(a), Visitante.<br><a href='login.php'>Fazer Login</a> ou <a href='cad_cli.php'>Cadastrar</a>."
        ?>
    </p>
    <div class="menu">
    <a class='links_menu' href='catalogo_produtos.php'>Produtos</a> | <a class='links_menu' href='carrinho.php'>Carrinho</a> | <a class='links_menu' href='area_usuario.php'>Área do Usuário</a>
 
    <form method="get"action="#">
        <input type="text" class="pesquisa" placeholder="Pesquisar">
    </form>
    </div>
    
</header>