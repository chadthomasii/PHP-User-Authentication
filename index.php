<?php

session_start();

require 'includes/database.php';


if(isset($_SESSION['user_id']))
{
    //Stores result from database
    
}


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Web App Login</title>
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  </head>
  <body>
      
      <div class="header">
          
          <a href="index.php">Web App</a>
      
      </div>
      
      <br>
      
      <?php 
      
      if(isset($_SESSION['user_id']))
      {
        echo "Welcome, You are Logged in.";
          
        echo "<br><br><a href='logout.php'>Logout?</a>";
      }
      
      else
      {
          
          echo "<h1>Please Login or Register</h1>
          <a href='login.php'>Login</a> or
          <a href='register.php'>Register</a>";
      }
    
    
      ?>
    
      
  
  
  </body>
</html>