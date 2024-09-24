<?php
require '_nav.php';
?>

<?php
//session_start();
 //$_SESSION['loggedin'] = true;
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System - Welcome - <?php  $_SESSION['uname'];
    ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <?php
 
 if($_SESSION['login']){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your are login successfully!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  } 
    ?>

<div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4 ">Welcome  <?php echo $_SESSION['uname'];
    ?></h1>
            <p class="lead">Hey how are you ? Welcome to isecure . you are logged in as <u><b><?php echo $_SESSION['email'];
?></b></u><br>
So, Thank you for visit my LOGIN SYSTEM website.<br>
Thank you,<br><i><?php echo $_SESSION['uname'];
    ?></i></p>
                <a class="btn btn-primary btn-lg" href="logout.php" role="button">Logout</a>
        </div>
    </div>


</body>
</html>