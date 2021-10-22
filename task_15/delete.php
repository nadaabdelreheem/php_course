<?php

    require 'DBClass.php';
    require 'validateClass.php';

    #Fetch ID .....
    $id = $_GET['id'];

    $validate = new validator;
    
    if($validate->validate($id,'int')){
        
        $delobj = new DB;

        $sql    = "DELETE FROM blog WHERE id =$id ";
        
        $done   = $delobj->Query($sql);
        
        if($done){
            
            header("Location: display.php");
        }else{
            
            echo "Error TRy again";
        }
        
    }

   


?>