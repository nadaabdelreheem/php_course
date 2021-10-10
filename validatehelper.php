<?php

    function clean($input){
        
        $input = trim($input);
        $input = htmlspecialchars($input);
        $input = stripslashes($input);
        
        return $input;
    }


    function validate($input , $filed){
        
        $status = true;
        
        switch ($filed){
                
            case 'empty' :
                
                if (empty($input)){
                    
                    $status = false;
                }
                break;
                
            case 'name':
                
                if(!ctype_alpha($input)){
                
                    $status = false;
                }
                break;
                
            case 'password':
                
                 if(strlen($input) < 6){
                     
                    $status = false;
                 }  
                break;
                
            case 'email':
                
                if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
                    
                    $status = false;
                }
                break;
                
            case 'address' :
                
                if(strlen($input) < 10){
                    
                    $status = false;
                }
                break;
                
            case 'url' :
                
                if (!filter_var($input, FILTER_VALIDATE_URL)){
                    
                    $status = false;
                }
                break;
                
            case 'con_len' :
                
                 
                if(strlen($input) < 50){
                    
                    $status = false;
                }
                break;
        
        }
        
        return $status;
    }
    
  
?>