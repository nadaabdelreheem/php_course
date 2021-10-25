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
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

<div class="container">
  <h2>Register</h2>
  <form  action="{{ url('/Register')}}"  method="post"   enctype ="multipart/form-data">

      
      @csrf
  

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text"  name="name" value="{{ old('name') }}" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email"   name="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1"> Password</label>
    <input type="password"   name = "password" value="{{ old('password') }}" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
      
  <div class="form-group">
    <label for="inputAddress">Address:</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" value="{{ old('address') }}">
  </div>
      
 <label for="basic-url">Linkedin URL:</label>
 <div class="input-group mb-3">
  
  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="url" value="{{ old('url') }}"placeholder="http://www.linkedin.com/in/username">
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

    
  
  <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>

