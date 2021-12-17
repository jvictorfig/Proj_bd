<?php

    if(isset($_POST['editarCategoria'])){

        $categoria_nome = mysqli_real_escape_string($mySQL->link,$_POST['categoria_nome']);
        $categoria_id = mysqli_real_escape_string($mySQL->link,$_POST['categoria_id']);

        $sql = $mySQL->sql("
                                UPDATE
                                    `categoria`
                                SET
                                    `categoria_nome` = '".$categoria_nome."'
                                WHERE
                                    `categoria_id` = '".$categoria_id."';
        ");

        header("Location:categorias.php?action=editarCategoria&editarCategoria=$categoria_nome");

    }

    if(isset($_GET['editarCategoria'])){

    }
    

?>