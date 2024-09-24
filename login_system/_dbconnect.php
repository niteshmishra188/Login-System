<?php
$con = mysqli_connect("localhost","root","556624","users");
if(!$con){
    
    die("connection to this database faild due to " .mysqli_error($con));
}
  
?>