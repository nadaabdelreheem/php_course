<?php

    include ('validatehelper.php');


    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $name     = clean($_POST['name']);
        $password = clean($_POST['password']);
        $email    = clean($_POST['email']);
        $address  = clean($_POST['address']);
        $url      = clean($_POST['url']);
        $gender   = clean($_POST['gender']);
        $filename = clean($_FILES['file']['name']);
        
        $errors = [];
        
        
        
        if (!validate($name, 'empty')){
            
           $errors['Name'] = "Filed Require ";
            
        }elseif (!validate($name, 'name')){
            
            $errors['Name'] = "Name Shouldn't contain numbers";
            
        }else{
            
            echo "Name : " . $name . "<br>";
        }
        
        if (!validate ($password , 'empty')){
            
            $errors['Password'] = "Filed Require ";
            
        }elseif (!validate($password,'password')){
            
            $errors['Password'] = "Your Password Is Too short";
            
        }else {
            
            echo "Password : " . $password . "<br>";
        }
        
        if (!validate($email,'empty')){
            
            $errors['Email'] = "Filed Require";
            
        }elseif (!validate($email,'email')){
            
             $errors['Email'] = "Invalid Email";
            
        }else{
            
            echo "E-mail : " . $email . "<br>";
            
        }
        
        if (!validate($address,'empty')){
            
             $errors['Address'] = "Filed Require";
            
        }elseif(!validate($address,'address')){
            
             $errors['Address'] = "Enter Your Complete Address";
            
        }else{
            
            echo "Address : " . $address . "<br>";
            
        }
        
        if (!validate ($url,'empty')){
            
             $errors['URL'] = "Filed Require";
            
        }elseif (!validate($url,'url') && $url !== "http://www.linkedin.com/in/" . $name){
            
             $errors['URL'] = "Invalid Linked-In URL";
            
        }else{
            
            echo "Profile URL : " . $url . "<br>";
            
        }
        
        if (!validate($gender,'empty')){
            
             $errors['Gender'] = "Please Choose Your Gender";
            
        }else {
            
            echo "Gender : " . $gender . "<br>";
            
        }
        
       
        
        if (!validate($_FILES['file']['name'] , 'empty')){
            
             $errors['File'] = "Filed Require";
        
        }else{
            
             
            $filetmp  = $_FILES['file']['tmp_name'];
            $filename = $_FILES['file']['name'];
            $filesize = $_FILES['file']['size'];
            $filetype = $_FILES['file']['type'];
            
            $allowedfile = explode ('/' , $filetype );
            
            if($allowedfile[1] == 'pdf'){
                
               //if(move_uploaded_file($filetmp,'./profile/')){
                   
                    echo "Your CV : " . $filename  ."<br>";
              // }
                
                
            }else{
                
                 $errors['File'] = "Invalid Extention";
            }
            
        }
        
        if(count($errors) > 0){
            
            foreach($errors as $key => $val){
                
                echo $key . ": " . $val . "<br>";
            }
        }else{
            
            $file = fopen('profile' , "a") or die('unable to open file');
        
            //  $data = implode('-',$_POST) . "\n";
            
            
          $data = "Name : " . $name . "\n" .
                "Password : " . $password . "\n" .
                "Email : " . $email . "\n" .
                "Address : " . $address . "\n" .
                "Url : " . $url . "\n" .
                "Gender : " . $gender . "\n" .
                "CV : " . $filename . "\n";
            
          fwrite($file ,$data );
        
          fclose($file);
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
        <h2>Upload Your CV</h2>
    
            <div class="form-group">
                
                <input type="file" name="file">
            </div>
      </div>
 
  
  <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>

