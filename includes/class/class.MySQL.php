<?php
class MySQL {
        var $host;
        var $user;
        var $pass;
        var $db ;

        var $query;
        var $link;
        var $result;
        
        function MySQL(){
        }

        function connect(){
                        $this->host = "localhost";
                        $this->user = "projeto";
                        $this->pass = "key!databaseadmin";
                        $this->db   = "projeto";
                
                $this->link = mysql_connect($this->host,$this->user,$this->pass,$this->db);
		mysql_set_charset($this->link,'utf8');
                
                if(!$this->link){
                        echo "<div class='alertMessage error SE'>ERRO NA CONEXÃO.<br>"
                                ."<b>MySQL retornou: </b> ".mysql_error($this->link)."<br></div>";
                        die();
                }
        }

        function sql($query){
                $this->connect();
                $this->query = $query;
                if($this->result=mysql_query($this->link, $this->query)){
                        return $this->result;
                } else {
                        die("<div class='alertMessage error SE'><h2>OCORREU UM ERRO AO EXECUTAR A QUERY SQL ABAIXO:</h2><br>".$query."<<br><br><b>MySQL Retornou: ".mysql_error($this->link)."<b></div>");
                }
        }

        function disconnect(){
                return mysql_close($this->link);
        }
}
?>