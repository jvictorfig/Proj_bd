<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
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
                try {      
                        $servername = "127.0.0.1"; 
                        $username = "root"; 
                        $password = "key!databaseadmin";
                        $banco = "projeto";
                        $conn = new mysql($servername, $username, $password, $banco);
                        if ($conn->connect_error) {   
                                die("Connection failed: " . $conn->connect_error); } 
                                echo "Connected successfully";
                } 
                catch(Exception $e) {     
                        echo $e->getMessage(); }
                       
        }

        function sql($query){
                $this->connect();
                $this->query = $query;
                if($this->result=mysql_query($this->link, $this->query)){
                        return $this->result;
                } else {
                        die("<div class='alertMessage error SE'><h2>OCORREU UM ERRO AO EXECUTAR A QUERY SQL ABAIXO:</h2><br>".$query."<<br><br><b>MySQL Retornou: ".mysqli_error($this->link)."<b></div>");
                }
        }

        function disconnect(){
                return mysql_close($this->link);
        }
}
?>