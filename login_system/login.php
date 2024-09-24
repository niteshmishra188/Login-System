<?php
require '_nav.php';
?>
<?php
   $login = false;
$showerr = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  require '_dbconnect.php';
 
  $email = $_POST['email'];
  $password = $_POST['password'];  
          
/*
  $sql = "SELECT * FROM `users` WHERE email= '$email' AND password = '$password'";
$result= mysqli_query($con,$sql);
              $num = mysqli_num_rows($result);
              if($num == 1){
               // $login =true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header("location: welcome.php");
          }
          else{
            $showerr = true;
          }

*/
             $sql = "SELECT * FROM `users` WHERE email= '$email'";
              
             
             $result= mysqli_query($con,$sql);
              $num = mysqli_num_rows($result);
              
                while($row= mysqli_fetch_assoc($result)){
                  if(password_verify($password,$row['password'])){
             
                    session_start();
                      $_SESSION['login'] = true;
                    $_SESSION['loggedin'] = true;
                    
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['uname'] =  $row['username'] ;
                    header("location: welcome.php");
                  }
                  else{
                    $showerr = true;
                  }
                }
               
          
         
}
?>

<?php
if($showerr){
  echo "<div class='w-2 alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>sorry!</strong> Inviled Email or Password . 
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>×</span>
  </button>
</div>";
} 
?>
<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login System - Login </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
  <div class="container my-4">
    <h1 class="text-center">Login to our Website</h1>
    <form action="login.php" method="POST">
      <div class="form-group">
        <label for="email1">Email address</label>
        <input type="email" name="email" class="form-control" id="Email1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="title">Password</label>
        <input type="password" class="form-control" id="Password1" name="password" aria-describedby="emailHelp">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

</body>

</html>