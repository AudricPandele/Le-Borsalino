<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      echo('ici');
      // name and password sent from form 
      
      $name = mysqli_real_escape_string($db,$_POST['name']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE name = '$name' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $name and $password, table row must be 1 row
		
      if($count == 1) {
         session_register("name");
         $_SESSION['login_user'] = $name;
         
         header("location: reservations.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>