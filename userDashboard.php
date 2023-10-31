<?php
session_start();
if(!isset($_SESSION['email'])){
    header('Location: login.php');
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

    <title> Welcome to our project! </title>
  </head>
  <body>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 mt-5">
        <div class="card">
          <div class="card-header"> 
          <?php if($_SESSION['role'] == 'user'){   ?>
            <span class="badge badge-primary"> User Panel </span>
            <?php }else { ?>
            <span class="badge badge-primary"> Admin Panel </span>
            <?php } ?>

          <h2> Welcome <?php echo $_SESSION['fullName']; ?> </h2> </div>
          <div class="card-body">
  <?php if($_SESSION['role'] == 'user'){   ?>
    
    <table class="table table-bordered">
        <tr>
            <td> Full Name </td>
            <td> <?php echo $_SESSION['fullName']; ?> </td>
        </tr>
        <tr>
            <td> Email </td>
            <td> <?php echo $_SESSION['email']; ?> </td>
        </tr>
        <tr>
            <td> Age </td>
            <td> <?php echo $_SESSION['age']; ?> </td>
        </tr>
    </table>
    
  <?php }else { ?>
    <h1> Welcome <?php echo $_SESSION['fullName']; ?> </h1>
    <p> This is a admin page.</p>
  <?php } ?>
</div>
  <div class="card-footer">
    <a href="logout.php"> Logout </a>
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