<?php

$db_name= $_ENV['DB_NAME'];
$db_host= $_ENV['DB_HOST'];
$db_user= $_ENV['DB_USER'];
$db_password= $_ENV['DB_PASSWORD'];

$dsn = 'mysql:dbname='.$db_name.';host='.$db_host.';'
if($dsn){
        $conexion = new PDO($dsn, $db_user, $db_password);
        // echo "conexion establecida";
  
    }else{
        echo "conexion fallida";
    }
    
?> 
 