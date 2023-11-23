
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

    <title>Register</title>
</head>
<body>

<?php
include 'db_conn.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $bio=$_POST['bio'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $destinationfile='upload-images/default.png';
    if(isset($_FILES['image'])){
      $filename=$_FILES['image']['name'];
      $filesize=$_FILES['image']['size'];
      $filetmp=$_FILES['image']['tmp_name'];
      $filetype=$_FILES['image']['type'];

      $fileext=explode('.',$filename);
      $filecheck=strtolower(end($fileext));
      $fileextstored=array('png','jpg','jpeg','webp');
      if(in_array($filecheck,$fileextstored)){
          $destinationfile='upload-images/'.$filename;
            move_uploaded_file($filetmp,$destinationfile);

      }
   }

    

    
    $result = $conn->query("select * from reg_info_reg where email = '".$email."'");

    if(empty($fname) || empty($lname) ||empty($email)||empty($phone)||empty($bio)||empty($password)||empty($cpassword)){
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
        
  
    }else if($result){
      if($result->num_rows >0){
        echo '<div classs="container p-5">
        <div class="row no-gutters">
          <div class="col-lg-6 col-md-12 m-auto">
            <div class="alert alert-danger fade show" role="alert">
              <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="True">&times;</span>
                </button>
               <h4 class="alert-heading">User already present!</h4>
                <p>Please login</p>
            </div>
          </div>
        </div>  
      </div>';
      }
      else{
        // echo "Not present";
        if($cpassword==$password){
        
          $sql="INSERT INTO `reg_info_reg` (`fname`,`lname`, `email`,`phone`, `bio`, `password`,`image`) VALUES ('$fname','$lname', '$email','$phone','$bio','$password','$destinationfile')";
  
          $res=mysqli_query($conn,$sql);
            if($res){
                echo '<div classs="container p-5">
                <div class="row no-gutters">
                  <div class="col-lg-6 col-md-12 m-auto">
                    <div class="alert alert-success fade show" role="alert">
                      <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                          <span aria-hidden="True">&times;</span>
                        </button>
                       <h4 class="alert-heading">Well done!</h4>
                        <p>Registration Sucess!!! You can login now</p>
                    </div>
                  </div>
                </div>
              </div>';
            }else{
                echo '<div classs="container p-5">
                <div class="row no-gutters">
                  <div class="col-lg-6 col-md-12 m-auto">
                    <div class="alert alert-success fade show" role="alert">
                      <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                          <span aria-hidden="True">&times;</span>
                        </button>
                       <h4 class="alert-heading">Hang on!</h4>
                        <p>We are facing some tech issues!!</p>
                    </div>
                  </div>
                </div>
              </div>';
            }
      }else{
          
          echo "pass do not match";
      }
      }
    }


  
}
?>

    <form action="/phpstart/registration.php" method='post' enctype="multipart/form-data">

        <section class="h-100 bg-dark">
          <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col">
                <div class="card card-registration my-4">
                  <div class="row g-0">
                    <div class="col-xl-6 d-none d-xl-block">
                      <img src="regimg.webp"
                        alt="Sample photo" class="img-fluid"
                        style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                    </div>
                    <div class="col-xl-6">
                      <div class="card-body p-md-5 text-black">
                        <h3 class="mb-5 text-uppercase">Registration form</h3>
        
                        <div class="row">
                          <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            
                              <input type="text" id="fname" name="fname" class="form-control form-control-lg" />
                              <label class="form-label" for="fname" >First name</label>
                              <h6 id="fname_err"></h6>
                            </div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <div class="form-outline">
                              <input type="text" name="lname" id="lname" class="form-control form-control-lg" />
                              <label class="form-label" for="lname">Last name</label>
                              <h6 id="lname_err"></h6>
                            </div>
                          </div>
                        </div>
        
                        <div class="form-outline mb-4">
                          <input type="email" name="email" class="form-control form-control-lg name" />
                          <label class="form-label" for="email">Email ID</label>
                        </div>
                       
                        <div class="form-outline mb-4">
                            <input type="number"  id="phone" class="form-control form-control-lg" name="phone"/>
                            <label class="form-label" for="phone">Phone</label>
                            <h6 id="ph_err"></h6>
                        </div>
        
                        <div class="form-outline mb-4 ">
                            <textarea class="form-control" id="ibio" name="bio" rows="3"></textarea>
                            <label class="form-label" for="bio">Add Bio:</label>
                            <h6 id="bio_err"></h6>
                        </div>
                        
                        <div class="form-outline mb-4">
                            <label for="myfile">Select a file:</label>
                            <input type="file" id="myfile" name="image">
                        </div>
        
                        <div class="form-outline mb-4">
                          <input type="password" class="form-control form-control-lg" id="pass" name="password"/>
                          <label class="form-label" for="password">Password</label>
                          <h6 id="pass_err"></h6>
                        </div>
                        <div class="form-outline mb-4">
                          <input type="password" class="form-control form-control-lg" id="cpass" name="cpassword"/>
                          <label class="form-label" for="cpassword">Confirm Password</label>
                          <h6 id="cpass_err"></h6>
                        </div>
        
        
                        <div class="d-flex justify-content-end pt-3">
                          
                          <a class="btn btn-dark btn-lg ms-2 mr-2" href="/phpstart/loginform.php">login here</a>
                          <button type="submit" class="btn btn-warning btn-lg  ms-2" id= "btn_sub">Submit form</button>
                        </div>
        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
   
    
    </form>
    
</body>
</html>