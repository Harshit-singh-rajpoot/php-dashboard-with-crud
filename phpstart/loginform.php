
<!-- for form post method -->
<?php
include 'db_conn.php';
session_start();

if(isset($_SESSION['loggedin'])){
  header("location:welcome.php");
  exit; 
}

if($_SERVER['REQUEST_METHOD']=='POST'){

  $email=$_POST['email'];
  $password=$_POST['password'];

  if(empty($email)||empty($password)){
    echo '<div classs="container p-5">
    <div class="row no-gutters">
      <div class="col-lg-6 col-md-12 m-auto">
        <div class="alert alert-success fade show" role="alert">  
          <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
              <span aria-hidden="True">&times;</span>
            </button>
           <h4 class="alert-heading">Please fill!</h4>
            <p>One or more fields are empty!!!</p>
        </div>
      </div>
    </div>
  </div>';
  }else{
    // $res=$conn->query("select * from reg_info_reg where email ='$email' and password= '$password'");
    $res=$conn->query("select * from reg_info_reg where email ='$email' and password= '$password'");
    $num=mysqli_num_rows($res);
    if($num==1){
      $row=mysqli_fetch_assoc($res);

      
          $_SESSION['loggedin']=true;
          $_SESSION['fname']=$row['fname'];
          $_SESSION['lname']=$row['lname'];
          $_SESSION['email']=$row['email'];
          $_SESSION['phone']=$row['phone'];
          $_SESSION['bio']=$row['bio'];
          $_SESSION['password']=$row['password'];
          $_SESSION['image']=$row['image'];
         echo($_SESSION['bio']);
        //  die();
          header("location: welcome.php");
        }else {
          echo '<div classs="container p-5">
      <div class="row no-gutters">
        <div class="col-lg-6 col-md-12 m-auto">
          <div class="alert alert-danger fade show" role="alert">
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="True">&times;</span>
              </button>
             <h4 class="alert-heading">Invalid ID and PASSWORD!</h4>
          </div>
        </div>
      </div>
    </div>';

        }
      
      // print_r($row);
  }

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="validation.js"></script>
    <title>Login</title>
</head>
<body>


<section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="lf1.webp"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="/phpstart/loginform.php" method="post">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Login Here!!!</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="email" id="form2Example17" name="email" class="form-control form-control-lg" />
                    <label class="form-label" for="email">Email address</label>
                  </div>
                  

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example27" name="password" class="form-control form-control-lg" />
                    <label class="form-label" for="passsword">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                  </div>
                  <div class="pt-1 mb-4">
                  <a class="btn btn-warning btn-lg btn-block" href="/phpstart/registration.php">Register here</a>
                  </div>
    
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
</body>
</html>