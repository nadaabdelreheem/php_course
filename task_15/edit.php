<?php
    
    require 'createClass.php';
    require 'ValidateClass.php';

    $id = $_GET['id'];

    #Create DB object .....
    $obj1 = new DB;
    $sql1 ="SELECT * FROM blog WHERE id =$id";
    $done = $obj1->Query($sql1);
    $data = mysqli_fetch_assoc($done);
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        #Create Validate Object ...
        $validate = new validator;
       
        $title   = $validate->clean($_POST['title']);
        $content = $validate->clean($_POST['content']);
        
        #Image....
        $imagetmp  = $_FILES['image']['tmp_name'];
        $imagename = $validate->clean($_FILES['image']['name']);
        $imagesize = $_FILES['image']['size'];
        $imagetype = $_FILES['image']['type'];
        
        #Create Empty Array To Carry Errors ....
        $errors = [];
        
        #ID VALIDATION ....
        if(!$validate->validate($id,'int')){
            
            $errors['ID'] = "Invalid ID"; 
        }
       
        #Title Require + String ....
        if(!$validate->validate($title,'empty')){
            
            $errors['Title'] = 'Field Required';
            
        }elseif(!$validate->validate($title,'string')){
            
            $errors['Title'] = 'Title Should Be String';
            
        }
        
        #Content Require + length > 50ch ...
        if(!$validate->validate($content,'empty')){
            
            $errors['Content'] = 'Field Required';
            
        }elseif(!$validate->validate($content,'con_len')){
            
            $errors['Content'] = 'Content Too short...It Must Be more Than 50ch';
            
        }
        
        #Image Require ...
        if(!$validate->validate($imagename,'empty')){
            
            $errors['Image'] = 'Field Required';
            
        }else{
            
            $allowedtype = ['jpg','png','jpeg'];
            $exten = explode ('/',$imagetype);
            
            if(in_array($exten[1],$allowedtype)){
                
                $finaleName =  $imagename . "." . $exten[1];
                
                
            }else{
                
                $errors['Image'] = 'Invalid Image Type';
            }
        }
        
        #Check and Echo Errors .....
        if(count($errors) > 0){
            
            foreach($errors as $key=>$value){
                
                echo "*". $key . ": " . $value ."<br>";
            }
        }else{
            
            $crobj = new Create($title,$content,$imagename);
           
            $result = $crobj->update($id);
            
            /*echo mysqli_error($crobj);
            exit();*/
            
            if($result){
                
                echo "Data INserted";
                header ("Location: display.php");
                
            }else{
                
                echo "Error Try Again";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title> Edit Blog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</head>
<body>

<div class="container">
  <h2> Edit Blog</h2>
  <form  action="edit.php?id=<?php echo $data['id'];?>"   method="post"   enctype ="multipart/form-data">

  

  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text"  name="title"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Title" value="<?php echo $data['title'];?>">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Content</label>
    <input type="text"   name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Content" value="<?php echo $data['content'];?>">
  </div> 
      
      <h2><br>Upload Your Image</h2>
    
            <div class="form-group">
                
                
                <input type="file" name="image"><br> 

                 <img style="width:50px;height:50px;" src="<?php echo $data['image'];?>">
                <br>
            </div>
           

  
  <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>
</div>

</body>
</html>