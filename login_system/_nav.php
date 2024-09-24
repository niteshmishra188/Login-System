<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <title>Login System</title>-->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <?php
     session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true){
      $loggedin = true;
  }else {
    $loggedin=false;
  }
 
  echo '
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <img src="/note/logo.jpg" height="40px" width="40px"
                style="border-radius: 50%; "> <a class="navbar-brand mx-3" href="#"> isecure </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
      <ul class="navbar-nav mr-auto ml-2">
      
        <li class="nav-item active">
          <a class="nav-link " href="/login_system/welcome.php">Home </a>
        </li>';
        if(!$loggedin){
          echo '
        <li class="nav-item">
          <a class="nav-link" href="/login_system/signup.php">Signup</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login_system/login.php">Login</a>
        </li>';
        }
        if($loggedin){
           echo '
        <li class="nav-item">
          <a class="nav-link" href="/login_system/logout.php">Logout</a>
        </li>';
        }

        echo '
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>';
  ?>
</body>
</html>