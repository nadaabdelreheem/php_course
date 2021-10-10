<?php

    $server = "localhost";
    $dbuser = 'root';
    $password = '';
    $dbname ='my_db';

    $connect = mysqli_connect($server,$dbuser,$password,$dbname);

    if(!$connect){
        
        die ('Error ' . mysqli_connect_error());
        
    }

    

?>