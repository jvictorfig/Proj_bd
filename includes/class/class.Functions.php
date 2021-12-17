<?php
// Conexão direta com o banco
//Lembrar de ajustar configuração com o banco de dados central

function nomeCategoria($produto_id){

    global $mySQL;
    $sql = $mySQL->sql("SELECT c.categoria_nome FROM produto_categoria pc
                        INNER JOIN categoria c ON (c.categoria_id = pc.categoria_id)
                        WHERE pc.produto_id = '".$produto_id."' ");
    while ($categoria_nome = mysqli_fetch_array($sql)){
        echo "<small class='badge badge-success'>".$categoria_nome['categoria_nome']."</small> ";
    }
    return 1;

}

?>