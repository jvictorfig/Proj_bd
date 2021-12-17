<?php

    if(isset($_POST['cadastrarProduto'])){

        $produto_nome = mysqli_real_escape_string($mySQL->link,$_POST['produto_nome']);
        $produto_valor = mysqli_real_escape_string($mySQL->link,$_POST['produto_valor']);
        $categoria_id = mysqli_real_escape_string($mySQL->link,$_POST['categoria_id']);

        $sqlProduto = $mySQL->sql("
                                INSERT INTO
                                    `produto`
                                    (`produto_nome`, `produto_valor`)
                                VALUES
                                    ('".$produto_nome."', '".$produto_valor."');
        ");

        $produto_id = mysqli_insert_id($mySQL->link);

        $sqlProdutoCategoria = $mySQL->sql("
                                                INSERT INTO
                                                    `produto_categoria`
                                                    (`produto_id`, `categoria_id`)
                                                VALUES
                                                    ('".$produto_id."', '".$categoria_id."')
        ");

        header("Location:index.php?action=cadastrarProduto&cadastrarProduto=$produto_nome");

    }

    if(isset($_GET['cadastrarProduto'])){

    }
    

?>