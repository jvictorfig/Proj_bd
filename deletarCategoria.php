<?php

    if(isset($_GET['deletarCategoria'])){

        $categoria_id = $_GET['deletarCategoria'];

        $deletarCategoria = $mySQL->sql("
                                DELETE FROM
                                    `categoria`
                                WHERE
                                    `categoria_id` = '".$categoria_id."';
        ");

        header("Location:categorias.php?action=deletarCategoria&categoria_id=$categoria_id");

    }

?>