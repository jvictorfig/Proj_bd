<?php
#TIP: DO NOT CHANGE ANYTHING HERE OR YOU WILL BURN IN HELL :D

//defines local translation date
setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");

//defines local path
ini_set('include_path', '../:'.ini_get('include_path'));

require_once ("connect.php");

$queryProdutos = $mySQL->sql("SELECT * FROM `produto` ORDER BY produto_nome ASC");
?>
