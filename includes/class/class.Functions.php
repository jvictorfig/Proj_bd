<?php
// Conexão direta com o banco
//Lembrar de ajustar configuração com o banco de dados central
//$link = mysql_connect('localhost', 'semedweb', 'key!databaseadmin')  or die('MySQL: Nao foi possivel conectar-se ao banco de dados');
//mysql_select_db('sigem', $link) or die('MySQL: Nao foi possivel conectar-se ao banco de dados');

//$mySQL->sql('SET character_set_results=utf8');

//Teste gitignore 321

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
