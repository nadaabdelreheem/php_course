<?php

    include ('validatehelper.php');

    session_start();


    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $name     = clean($_POST['name']);
        $password = clean($_POST['password']);
        $email    = clean($_POST['email']);
        $address   = clean($_POST['address']);
        $url      = clean($_POST['url']);
        $gender   = clean($_POST['gender']);
        
        

        
        
        
        if (!validate($name, 'empty')){
            
            echo "Filed Require <br>";
            
        }elseif (!validate($name, 'name')){
            
            echo "Name Shouldn't contain numbers" . "<br>";
            
        }else{
            
            echo "Name : " . $name . "<br>";
        }
        
        if (!validate ($password , 'empty')){
            
            echo "Filed Require <br>";
            
        }elseif (!validate($password,'password')){
            
            echo "Your Password Is Too short <br>";
            
        }else {
            
            echo "Password : " . $password . "<br>";
        }
        
        if (!validate($email,'empty')){
            
            echo "Filed Require <br>";
            
        }elseif (!validate($email,'email')){
            
            echo "Invalid Email <br>";
            
        }else{
            
            echo "E-mail : " . $email . "<br>";
            
        }
        
        if (!validate($address,'empty')){
            
            echo "Filed Require <br>";
            
        }elseif(!validate($address,'address')){
            
            echo "Enter Your Complete Address <br>";
            
        }else{
            
            echo "Address : " . $address . "<br>";
            
        }
        
        if (!validate ($url,'empty')){
            
            echo "Filed Require <br>";
            
        }elseif (!validate($url,'url') && $url !== "http://www.linkedin.com/in/" . $input){
            
            echo "Invalid Linked-In URL <br";
            
        }else{
            
            echo "Profile URL : " . $url . "<br>";
            
        }
        
        if (!validate($gender,'empty')){
            
            echo "Please Choose Your Gender <br>";
            
        }else {
            
            echo "Gender : " . $gender . "<br>";
            
        }
        
       
        
/*        if(isset($_FILES ['file']['name']) ){
            
            if(!validate($_FILES ['file']['name'],'empty')){
                
                echo "Choose File  <br>";
                
            }
        }else{
            
            $filetmp  = $_FILES['file']['tmp_name'];
            $filename = $_FILES['file']['name'];
            $filesize = $_FILES['file']['size'];
            $filetype = $_FILES['file']['type'];
       
            $allowedfile = explode ('/' , $filetype );
            
            if ($allowedfile[1] == 'pdf'){

                echo $filename .  $allowedfile[1] ."<br>";

            }else{
                
                echo "Invalid Extention <br>";

            }
        }
       */ 
        
        if (validate($_FILES['file']['name'] , 'empty')){
            
            $filetmp  = $_FILES['file']['tmp_name'];
            $filename = $_FILES['file']['name'];
            $filesize = $_FILES['file']['size'];
            $filetype = $_FILES['file']['type'];
            
            $allowedfile = explode ('/' , $filetype );
            
            if($allowedfile[1] == 'pdf'){
                
                echo $filename .  $allowedfile[1] ."<br>";
                
            }else{
                
                 echo "Invalid Extention <br>";
            }
            
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</head>
<body>

<div class="container">
  <h2>Register</h2>
  <form  action="<?php echo $_SERVER['PHP_SELF'];?>"   method="post"   enctype ="multipart/form-data">

  

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text"  name="name"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email"   name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password"   name = "password"  class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
      
  <div class="form-group">
    <label for="inputAddress">Address:</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" >
  </div>
      
 <label for="basic-url">Linkedin URL:</label>
 <div class="input-group mb-3">
  
  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="url" placeholder="http://www.linkedin.com/in/username">
 </div>
    
  <div class="form-check">
  <label for="exampleInputPassword1"> Gender:</label> <br>
  <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Female" checked>
  <label class="form-check-label" for="exampleRadios1">
    FEMALE
  </label>
  </div> 
      
  <div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Male">
  <label class="form-check-label" for="exampleRadios2">
    MALE
  </label>
</div>

      <div class="container">
        <h2>Upload Image</h2>
    
            <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="file" name="file">
            </div>
      </div>
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>

