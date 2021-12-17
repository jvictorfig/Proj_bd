<?php
// Conexão direta com o banco
//Lembrar de ajustar configuração com o banco de dados central

function nomeCategoria($categoria_id){

    global $mySQL;
    $sql = $mySQL->sql("SELECT categoria_nome FROM categoria WHERE categoria_id = '".$categoria_id."' ");
    $nomeCategoria = mysqli_fetch_array($sql);
    if (!$nomeCategoria['categoria_nome']){
        return "Sem categoria definida";
    }   else    {
            return $nomeCategoria['categoria_nome'];
    }

}

?>
