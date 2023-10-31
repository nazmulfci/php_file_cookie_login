<?php
session_start();

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if($email == '' || $password == '' ) {
  $errorMessage = 'Please enter email and password';
 
}else{
  $fn = fopen('./data/users.txt', 'r');
  
  $roles = array();
  $emails = array();
  $passwords = array();
  $fNames = array();
  $lNames = array();

  while($line = fgets($fn)) {
    //echo $line.'<br>';
    $values = explode(',', $line);

    // var_dump($values);
    // echo $values['0'];
    // echo '<br>';
    array_push($roles, $values[0]);
    array_push($fNames, $values[1]);
    array_push($lNames, $values[2]);
    array_push($emails, $values[3]);
    array_push($passwords, $values[4]);
  }
  fclose($fn);

  // print_r($role);
  // echo '<br>';
  // print_r($email);
  // echo '<br>';
  // print_r($password);

  $count = count($roles);
  for($i=1;$i<$count;$i++){
    if($roles[$i]=='user'){
    if($emails[$i] == $email && $passwords[$i] == $password){
      $successMessage = 'Login Successfully';
      $_SESSION['email'] = $email;
      $_SESSION['role'] = $roles[$i];
      $_SESSION['fullName'] = $fNames[$i].' '.$lNames[$i];
      header("Location: index.php");
    }
    else{
      $errorMessage = 'Invalid Email or Password';
    }
  }
  else
  {
    $errorMessage = 'Invalid Email or Password';
  }
  }

  if(!empty($_POST['remember'])){
    setcookie('email', $email, time() + 3600);
    setcookie('password', $password, time() + 3600);
  }
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
          <div class="card-header"> <h2>Login</h2> </div>
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
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email"
    value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email']; ?>"
    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"> Password </label>
    <input type="password" class="form-control"
    value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>"
     name="password" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-check mb-3">
    <input type="checkbox" name="remember" <?php if(isset($_COOKIE['password'])) echo 'checked'; ?> class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1"> Remember Password </label>
  </div>

  <a href="registration.php" class="float-left">Not a member? Register</a>
  <button type="submit" class="btn btn-primary float-right">Login</button>
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