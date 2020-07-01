<?php
    session_start();

    extract($_POST);
    $administrador = $_SESSION['id'];
    $foto = $_FILES["campo_img"];

    require"connection.php";

    print_r($_SERVER['DOCUMENT_ROOT']);

    if(!empty($foto["name"])){
        $largura=9999999999;
        $altura=9999999999;
        $tamanho=9999999999;
        $error=array();
        if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
            $error[1] = "Isso não é uma imagem.";
        }
        $dimensoes = getimagesize($foto["tmp_name"]);
        if($dimensoes[0] > $largura){
            $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
        }
        if($dimensoes[1] > $altura){
            $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
        }
        if($foto["size"] > $tamanho){
            $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
        }
        if (count($error) == 0) {
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i" , $foto["name"], $ext);
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
            $caminho_imagem = "../img/" . $nome_imagem;
            move_uploaded_file($foto["tmp_name"], $caminho_imagem);

            if ($id != null){
                $query = "update produto set nome = '$nome', descricao = '$descricao', preco = ".$preco.", fabricante = $fabricante, foto = 'img/$nome_imagem', categoria_id = $categoria, administrador_id = $administrador where id = ".$id;
                $result = mysqli_query($connection, $query);
            } else {
                $query = "insert into produto values (null, '$nome', '$descricao', $preco, '$fabricante', 'img/$nome_imagem', $categoria, $administrador)";
                $result = mysqli_query($connection, $query);
            }
        
            header("Location: ../catalogo_produtos.php");
    
            if (count($error)!= 0) {
                foreach ($error as $erro) {
                    echo $erro. "<br />";
                }
            }
            
        }
    }
?>