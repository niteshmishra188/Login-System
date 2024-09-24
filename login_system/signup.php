<?php
require '_nav.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login System - Signup</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>

<?php
 $insert = false;
 $showerr = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  require '_dbconnect.php';
 
  $username = $_POST["username"];
  $email = $_POST["email"];   
  $password = $_POST["password"];   
  $cpassword = $_POST["confpassword"];   
  // $exists = false;
  $existsql ="SELECT * FROM `users` WHERE email='$email'";
  $result= mysqli_query($con,$existsql);
  $numexistrow= mysqli_num_rows($result);
  if($numexistrow > 0){
    $showerr = "  user Already Exist";
  }else {
    if($password == $cpassword){
      //password hase stroe function
      $phase = password_hash($password,PASSWORD_DEFAULT);
      $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$phase')";
      // $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
      $result= mysqli_query($con,$sql);
 if($result){
   $insert = true;
 }
  }else{
   $showerr ="Password do not match";
 }
  }
 
 }
?>

<?php
if($insert){
  echo "<div class='w-2 alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your Account has been created successfully!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>×</span>
  </button>
</div>";
} 
?>
<?php
if($showerr){
  echo '<div class="w-2 alert alert-danger alert-dismissible fade show" role="alert">
  <strong>sorry!</strong>'. $showerr .'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>';
}

?>
  <div class="container my-4">
    <h1 class="text-center">Signup to our Website</h1>
    <div class="center">
      <form action="/login_system/signup.php" method="post">
        <div class="form-group">
          <label for="title">Username</label>
          <input type="text" class="form-control" id="title" name="username" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="Email1" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="title">Password</label>
          <input type="password" class="form-control" id="Password" name="password" aria-describedby="emailHelp" require>
        </div>
        <div class="form-group">
          <label for="title">Conform Password</label>
          <input type="password" class="form-control" id="confPassword" name="confpassword"
            aria-describedby="emailHelp" require>     
        </div>
        <button type="submit" id="btn" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
      </form>
    </div>
  </div>



</body>

</html>