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
 
    
    <h4> User List </h4>
    <table class="table table-bordered">
      <tr>
        <th> SL </th>
        <th> Role </th>
        <th> Full Name </th>
        <th> Email </th>
        <th> Password </th>
        <th> Age </th>
        <th> Action </th>
      </tr>
      <?php
       $fn = fopen('./data/users.txt', 'r');
  
       $roles = array();
       $emails = array();
       $passwords = array();
       $fNames = array();
       $lNames = array();
       $ages = array();
     
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
         array_push($ages, $values[5]);
       }
       fclose($fn);
     
      
     
       $count = count($roles);
       for($i=0;$i<$count;$i++){
        $sl = $i+1;
         echo '<tr>';
         echo '<td> '.$sl.' </td>';
         echo '<td> '.$roles[$i].' </td>';
         echo '<td> '.$fNames[$i].' '.$lNames[$i].' </td>';
         echo '<td> '.$emails[$i].' </td>';
         echo '<td> '.$passwords[$i].' </td>';
         echo '<td> '.$ages[$i].' </td>';
         echo '<td> 
         <a href="userEdit.php?email='.$emails[$i].'" class="btn btn-primary"> Edit </a>
         <a href="userDelete.php?email='.$emails[$i].'" class="btn btn-danger"> Delete </a>
          </td>';
         echo '</tr>';
       
       }
       ?>
      
    </table>
    
  
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