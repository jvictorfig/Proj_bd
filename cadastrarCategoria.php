<?php

    if(isset($_POST['cadastrarCategoria'])){

        $categoria_nome = mysqli_real_escape_string($mySQL->link,$_POST['categoria_nome']);

        $sql = $mySQL->sql("
                                INSERT INTO
                                    `categoria`
                                    (`categoria_nome`)
                                VALUES
                                    ('".$categoria_nome."');
        ");

        header("Location:categorias.php?action=cadastrarCategoria&cadastrarCategoria=$categoria_nome");

    }

    if(isset($_GET['cadastrarCategoria'])){

    }
    

?>