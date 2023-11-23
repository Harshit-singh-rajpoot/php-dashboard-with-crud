<?php
session_start();
include 'db_conn.php';
if(!isset($_SESSION['fname'])||$_SESSION['loggedin']!=true)
{
  header ("location:loginform.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/reg.css">
    <link href="bootstrap.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>

<script src="validation.js"></script>

    <title>Dashboard</title>
    
</head>
<body>
<div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="#">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto ">
      <a class="nav-item nav-link" href="welcome.php">Home </a>
      <a class="nav-item nav-link" href="update.php">Update</a>
      <a class="nav-item nav-link" href="logout.php">Logout</a>

    </div>
  </div>
</nav>
<div>

<?php

$q = "SELECT image FROM reg_info_reg WHERE email = '" . $_SESSION['email'] . "'";

$res=mysqli_query($conn,$q);
if($res){
    if($row=mysqli_fetch_assoc($res)){
        $img=$row['image'];
    }
}
?>
<div class="container ">
<h2 class="text-center">Welcome <?php echo $_SESSION['fname']?></h2>
<img class="img-fluid w-25 mx-auto rounded mb-4 d-flex justify-content-center" src="<?php echo $img ?> " alt="">

<table class="table table-striped table-success text-center ">
  <tr>
  <td>First Name:</td>
    <td><?php echo $_SESSION['fname'];?></td>
  </tr>
  
  <tr>
    <td>Last Name:</td>
    <td><?php echo $_SESSION['lname'];?></td>
  </tr>
  <tr>
  <td>Email:</td>
    <td><?php echo $_SESSION['email'];?></td>
  </tr>
  <tr>
  <td>Phone:</td>
    <td><?php echo $_SESSION['phone'];?></td>
  </tr>
  <tr>
  <td>Bio:</td>
    <td><?php echo $_SESSION['bio'];?></td>
  </tr>
</table>

</div>

        
</div>
</div>
    
</body>
</html>