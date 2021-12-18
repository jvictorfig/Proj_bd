<?php

    if(isset($_POST['cadastrarProdutoCategoria'])){

        $produto_id = mysqli_real_escape_string($mySQL->link,$_POST['produto_id']);
        $produto_nome = mysqli_real_escape_string($mySQL->link,$_POST['produto_nome']);
        $categoria_id = mysqli_real_escape_string($mySQL->link,$_POST['categoria_id']);

        $sqlProdutoCategoria = $mySQL->sql("
                                                INSERT INTO
                                                    `produto_categoria`
                                                    (`produto_id`, `categoria_id`)
                                                VALUES
                                                    ('".$produto_id."', '".$categoria_id."')
        ");

        header("Location:index.php?action=cadastrarProdutoCategoria&cadastrarProdutoCategoria=$produto_nome");

    }

    if(isset($_GET['cadastrarProdutoCategoria'])){

    }
    

?>