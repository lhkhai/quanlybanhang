<?php
function connect(){
            $server ='localhost';
            $username='root';
            $password='';
            $db='db_banhang';
            $conn = new mysqli($server,$username,$password,$db);
            return $conn;
}
?>