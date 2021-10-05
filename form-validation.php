<?php

    function clean($input){
        
        $input = trim($input);
        $input = htmlspecialchars($input);
        $input = stripslashes($input);
        
        return $input;
        
    }

     

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $name = clean ($_POST['name']);
        $email =clean ($_POST['email']);
        $password =clean ($_POST['password']);
        $address = clean ($_POST['address']);
        $gender = clean($_POST['gender']);
        $url = clean($_POST['url']);
        
       
        
        if(empty($name)){
            
            echo "Please Enter your name <br>"; 
        }
        if(empty($email)){
            
            echo "Please Enter your email <br>";
        }
        if(empty($password)){
            
            echo "Please Enter your password <br>";
        }
        if(empty($address)){
            
            echo "Please Enter your address <br>";
        }
        if(empty($gender)){
            
            echo "Please Enter your gender <br>";
        }
        if(empty($url)){
            
            echo "Please Enter your url <br>";
        }
        
        if(!empty ($name) && !empty($email) && !empty ($password) && !empty ($address) && !empty ($gender) && !empty ($url) ){
            
            if(ctype_alpha($name)){
                
                echo " Name: " . $name ."<br>";
                
            }else{
                
                echo "The Name shouldn't contain numbers <br>"; 
            }
            
           /* if (preg_match('/[^0-9]/',$name)){
                
                echo "The Name shouldn't contain numbers <br>";
                
            }else{
                
                echo "Your Name: " . $name . "<br>";
            }*/
           // echo "Your Name: " . filter_var($name, FILTER_SANITIZE_STRING) . "<br>"; 
            
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                
                echo " E-mail: " . $email . "<br>";
                
            }else{
                
                echo "Invalid email <br>";
                
            }
            
            
            if (strlen($password) < 6 ){
                
                echo " Password Is too short <br>";
                
            }else{
                
                echo " Password: " . $password . "<br>";
                
            }
            
            if (strlen($address) < 10){
                
                echo "Invalid Address <br>";
                
            }else{
                
                echo " Address: " . $address . "<br>";
            }
            
            if (filter_var($url, FILTER_VALIDATE_URL) && $url == "http://www.linkedin.com/in/" . $name){
                
                echo " Linkedin Profil url: " . $url . "<br>";
                
            }else{
                
                echo "Invalid Url <br>";
            }
            
            echo " Gender: " . $gender;

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
  <!--<div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
  </div>-->
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

 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>