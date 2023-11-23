<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="bootstrap.css" rel="stylesheet">
    <script src="bootstrap.bundle.js"></script>

    <title>registration</title>
  </head>
  <body>
<div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
</nav>
<?php
echo "Connecting to DB--->";
//creating variables
$servername="localhost";
$username="root"; 
$password="";
$database="db1";
//making connection
$conn=mysqli_connect($servername,$username,$password,$database);
//conditons 
if(!$conn){
    die ("DB acess failure facing tech issues".mysql_connect_error());
}else{
    echo "connected to db--->";
}
//creating db
// $sql="CREATE DATABASE db1";
// //query execution
// $result=mysqli_query($conn,$sql);
// if($result){
//     echo " Accessed to db";
// }else{
//     echo "<access but --->".mysqli_error($conn);
// }
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['pass']; 
    $cpass=$_POST['cpass']; 

    if($cpass==$pass){
      $sql="INSERT INTO `reg_info` ( `name`, `email`, `pass`) VALUES ('$name', '$email', '$pass')";
    $res=mysqli_query($conn,$sql);
          if($res){
              echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Registration Sucess</strong> You can login now.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
          }else{
              echo "tech issues";
          }

    }else{
      echo "pass do not match";
    }
}
?>
<div class="container">
    <h1>iSecure Registration Form</h1>
<form action="/phpstart/post.php" method='post'>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">email</label>
    <input type="email" name="email" class="form-control">
  </div>
  <div class="form-group">
    <label for="pass">pass</label>
    <input type="password" name="pass" class="form-control">
  </div>
  <div class="form-group">
    <label for="cpass">confirm pass</label>
    <input type="password" name="cpass" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div> 
  </body>
</html>