<?php

    require 'dbconnection.php';
    require 'validatehelper.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $title = clean($_POST['title']);
        $content = clean($_POST['content']);
        $imagename = clean($_FILES['image']['name']);
        
        $errors = [];
        
        #Title validation...
        if(!validate($title,'empty')){
            
            $errors ['title'] = 'Filed REquire';
            
        }elseif(!validate($title,'name')){
            
            $errors['title'] = 'Title should be string';
            
        }
        
        #Content Validation...
        if(!validate($content,'empty')){
            
            $errors['content'] = 'Filed Required';
            
        }elseif(!validate($content,'con_len')){
            
            $errors['content'] = "Content Should be more than 50ch";
            
        }
        
        #image validation...
        $imagetmp  = $_FILES['image']['tmp_name'];
        $imagename = $_FILES['image']['name'];
        $imagesize = $_FILES['image']['size'];
        $imagetype = $_FILES['image']['type'];
        
        $allowedEx = ['jpg','png','JPG','PNG'];
        
        $typearr   = explode('/',$imagetype);
        
        if(!validate($imagename,'empty')){
            
            $errors['image'] = 'Filed Required';
            
        }elseif (!in_array($typearr[1],$allowedEx)){
        
            $errors['image'] = 'Not Allowed Extension';
        }
       
        if(count($errors) > 0){
            
            foreach($errors as $key => $val){
                
                echo $key . " : " .$val ."<br>";
            }
        }else{
            
            #db insertion....
            $sql = "INSERT INTO articles (title,content,image)  VALUES ('$title' , '$content' , '$imagename')";
            $op = mysqli_query($connect,$sql);
            
            if($op){
                
                echo 'Data Inserted';
                
            }else{
                
                echo "Please Try again";
                
            }
            
            #close connection...
            mysqli_close($connect);
        }
        
        
        
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Article</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</head>
<body>

<div class="container">
  <h2>Article</h2>
  <form  action="<?php echo $_SERVER['PHP_SELF'];?>"   method="post"   enctype ="multipart/form-data">

  

  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text"  name="title"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Title">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Content</label>
    <input type="text"   name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Content">
  </div>

   <div class="container">
        <h2>Upload Your Image</h2>
    
            <div class="form-group">
                
                <input type="file" name="image">
            </div>
      </div>
 

 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>