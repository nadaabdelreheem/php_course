<?php

    #Create Class DB .....
    class DB{
    
        var $server   = 'localhost';
        var $dbuser   = 'root';
        var $password = '';
        var $dbname   = 'group7blog';
        var $con      = null;
        
        #DB Connection Method ......
        function __construct(){
            
            $this->con = mysqli_connect($this->server,$this->dbuser,$this->password,$this->dbname);
            
            #check con ....
            if(!$this->con){
                
                die('Error: ' . mysqli_connect_error());
            }
         
        }
        
        #Query Method ....
        function Query($sql){
            
            $op = mysqli_query($this->con , $sql);
            
            return $op;
            
        }
        
        #Close DBConnection ....
        function __destruct(){
            
         mysqli_close($this->con);
            
        }
        
    }

   /* #crate An object From DB Class ....
    $obj   = new DB();
    $sql   = "SELECT * FROM articales";
    $dosql = $obj->Query($sql);
   
    while($data = mysqli_fetch_assoc($dosql)){
        
        echo "* " . $data['title'] . "<br>";
        echo "* " . $data['content'] . "<br>";
        echo "* " . $data['pu_date'] . "<br>";
    }*/
    


?>