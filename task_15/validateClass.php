<?php

    #Create Class Validate ....
    class validator{
        
        
        function clean($input){
            
            $input = trim($input);
            $input = htmlspecialchars($input);
            $input = stripslashes($input);

            return $input;
        }
        
        function validate($input,$field){
            
            $status = true;
            
            switch($field){
                    
                case 'empty' :
                    
                    if(empty($input)){
                        
                        $status = false;
                    }
                    break;
                    
                case 'string':
                    
                    if(!preg_match('/[A-Za-z]/' ,$input)){
                        
                        $status = false;
                    }
                    break;
                    
                case 'password' :
                    
                    if(strlen($input) < 6){
                        
                        $status = false;
                    }
                    break;
                    
                case 'int': 
                    
                    if(!filter_var($input,FILTER_VALIDATE_INT)){
                        $status = false;
                    }  
                    break;    
                    
                case 'email':
                    
                    if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
                        
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
        
    }
?>