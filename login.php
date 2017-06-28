<?php
//Make sure users is not already logged in
session_start();

if(isset($_SESSION['user_id']))
{
    header('Location: index.php');
}

//Get Database
require("includes/database.php");


//Empty error
$message = '';
  
//Check to make sure that the users information was submitted to the form and not empty
if(!empty($_POST['email']) && !empty($_POST['password']))
{
    //Stores result from database
    $records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
    
    //Gets email from database
    $records->bindParam(':email', $_POST['email']); 
    $records->execute();
    
    //Gets email associative array
    $results = $records->fetch(PDO::FETCH_ASSOC);
    
    //If there are results, and the password inputed matches, log the user in.
    if(count($results) > 0 && password_verify($_POST['password'], $results['password'])) //Password verify matches the hashed password against result.
    {
        //Once succesfully logged in, set session and redirect
        $_SESSION['user_id'] = $results['id'];
        header("Location: index.php");
    }
    else
    {
        
        $message = 'Sorry, those credentials do not match';
    }
    
}


    
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login Below</title>
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  </head>
  <body>
      
      <div class="header">
          
          <a href="index.php">Web App</a>
      
      </div>
      
      <?php if(!empty($message)): ?>
      <p><?= $message ?></p>
      <?php endif; ?>
      
      <h1>Login </h1>
      <span>or <a href="register.php">Register here</a></span>
      
      <form action="login.php" method="POST">
          
          <input type="email" placeholder="Enter your email" name="email">
          
          <input type="password" placeholder="Enter your password" name="password">
          
          <input type="submit">
      
      
      </form>

  
  </body>
</html>