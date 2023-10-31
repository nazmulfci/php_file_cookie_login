<?php

$firstName = $_POST['FirstName'] ?? '';
$lastName = $_POST['LastName'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$age = $_POST['age'] ?? '';
$role = 'user';

if($email == '' || $password == '' || $firstName == '' || $lastName == '' || $age == '') {
  $errorMessage = 'All fields are required';
}else{
  $fn = fopen('./data/users.txt', 'a');
  fwrite($fn, "\n" .$role . ',' . $firstName . ',' . $lastName . ',' . $email . ',' . $password . ',' . $age);
  fclose($fn);
  $successMessage = 'Registration Successfully.';
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title> Welcome to our project!</title>
  </head>
  <body>
    
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 mt-5">
        <div class="card">
          <div class="card-header"> <h2>Registration Form</h2> </div>
          <div class="card-body">
          <form action="" method="post">

          <?php if(!empty($errorMessage)) { ?>
            <div class="alert alert-danger">
              <h5> <?php echo $errorMessage; ?> </h5>
            </div>
          <?php } ?>

          <?php if(!empty($successMessage)) { ?>
            <div class="alert alert-success">
              <h5> <?php echo $successMessage; ?> </h5>
            </div>
          <?php } ?>
  <div class="form-group">
    <label for="FirstName">First Name</label>
    <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="Enter First Name">
  </div>
  <div class="form-group">
    <label for="LastName">Last Name</label>
    <input type="text" class="form-control" id="LastName" name="LastName" placeholder="Enter Last Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="age">Age</label>
    <input type="number" class="form-control" id="age" name="age" placeholder="Age">
  </div>
  
  <a href="login.php" class="float-left">Allready a member? Login</a>
  <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>
          </div>
        </div> 
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>