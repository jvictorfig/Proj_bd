<?php

    if(isset($_POST['deletarProdutoCategoria'])){

        $produto_id = $_POST['produto_id'];
        $categoria_id = $_POST['categoria_id'];
        $produto_nome = $_POST['produto_nome'];

        $deletarProdutoCategoria = $mySQL->sql("
                                                    DELETE FROM
                                                        `produto_categoria`
                                                    WHERE
                                                        `categoria_id` = '".$categoria_id."';
        ");

        header("Location:index.php?action=deletarProdutoCategoria&produto_nome=$produto_nome");

    }

?>