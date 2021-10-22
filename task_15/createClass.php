<?php

    require 'DBClass.php';
    
    class Create{
    
        private $title;
        private $content;
        private $imagename;
       
        
        public function __construct($val1,$val2,$val3){
            
             $this->title       = $val1;
             $this->content     = $val2;
             $this->imagename   = $val3;
            
        }
        
        public function create(){
            
            $dbobj = new DB;
            $sql   = "INSERT INTO blog (title,content,image) VALUES ('$this->title',' $this->content',' $this->imagename')";
            $done  = $dbobj->Query($sql);
            return $done;
            
//            echo mysqli_error($done);
        }
        
        public function update($id){
            
            $dbobj1 = new DB;
            $sql1  = "UPDATE  blog SET title = '$this->title',
                            content = '$this->content',
                            image   = '$this->imagename' WHERE id =$id)";
            
            $done1  = $dbobj1->Query($sql1);
            return $done1;
            
            
             //echo mysqli_error($done1);
        }
        
    }


 
?>