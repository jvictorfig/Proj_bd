<?php

    if(isset($_POST['editarProduto'])){

        $produto_nome = mysqli_real_escape_string($mySQL->link,$_POST['produto_nome']);
        $produto_valor = mysqli_real_escape_string($mySQL->link,$_POST['produto_valor']);
        $produto_id = mysqli_real_escape_string($mySQL->link,$_POST['produto_id']);

        $sql = $mySQL->sql("
                                UPDATE
                                    `produto`
                                SET
                                    `produto_nome` = '".$produto_nome."',
                                    `produto_valor` = '".$produto_valor."'
                                WHERE
                                    `produto_id` = '".$produto_id."';
        ");

        header("Location:index.php?action=editarProduto&editarProduto=$produto_nome");

    }

    if(isset($_GET['editarProduto'])){

    }
    

?>