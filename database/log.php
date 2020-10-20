<?php
  session_start();
  require_once 'connect.php';
  if (isset($_SESSION['user'])){
    
    if ($_POST['page']){
      $date = date("Y-m-d");
      $page = $_POST['page'];
      $user_id = $_SESSION['user']['id'];
      mysqli_query($connect, "INSERT INTO `logs` SET `date`='$date', `page`='$page',`user_id`='$user_id'");
    }
  }
?>