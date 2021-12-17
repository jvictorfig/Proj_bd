<?php

    if(isset($_GET['deletarProduto'])){

        $produto_id = $_GET['deletarProduto'];

        $deletarProduto = $mySQL->sql("
                                        DELETE FROM
                                            `produto`
                                        WHERE
                                            `produto_id` = '".$produto_id."';
        ");

        $deletarProdutoCategoria = $mySQL->sql("
                                                    DELETE FROM
                                                        `produto_categoria`
                                                    WHERE
                                                        `produto_id` = '".$produto_id."';
        ");

        header("Location:index.php?action=deletarProduto&produto_id=$produto_id");

    }

?>