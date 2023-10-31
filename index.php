<?php
session_start();
if(!isset($_SESSION['email'])){
    header('Location: login.php');
}

if($_SESSION['role'] == 'user'){
    header('Location: userDashboard.php');
}
else{
    header('Location: adminDashboard.php');
}
?>