<?php

include 'db_conn.php';
session_start();
if(!isset($_SESSION['fname'])||$_SESSION['loggedin']!=true)
{
  header ("location:loginform.php");
  exit;
}

if($_SERVER['REQUEST_METHOD']=='POST'){

      // $destinationfile='upload-images/'.$filename;
      $destinationfile=$_SESSION['image'];//uplo-img/sc.jpg
      
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
            //   echo $destinationfile;
  
        }
    }


    $fname = (empty($_POST['fname']))?$_SESSION['fname']:$_POST['fname'];
    $lname = (empty($_POST['lname'])) ? $_SESSION['lname'] : $_POST['lname'];
    // $email = (empty($_POST['email'])) ? $_SESSION['email'] : $_POST['email'];
    $phone = (empty($_POST['phone'])) ? $_SESSION['phone'] : $_POST['phone'];
    $bio = (empty($_POST['bio'])) ? $_SESSION['bio'] : $_POST['bio'];
    $password = (empty($_POST['password'])) ? $_SESSION['password'] : $_POST['password'];
    $image = (empty($_POST['image'])) ? $_SESSION['image'] : $destinationfile;
   
    


    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date("Y-m-d H:i:s");


        $_SESSION['fname']=$fname;
        $_SESSION['lname']=$lname;
        // $_SESSION['email']=$email;
        $_SESSION['phone']=$phone;
        $_SESSION['bio']=$bio;
        $_SESSION['password']=$password;
        $_SESSION['image']=$image;  



if(!isset($_SESSION['fname'])||$_SESSION['loggedin']!=true){
    header("location:loginform.php");
    exit;
}else{
    $result = $conn->query("UPDATE reg_info_reg SET fname='$fname', lname='$lname', phone='$phone', bio='$bio', password='$password', updatedate='$timestamp',image='$destinationfile' WHERE email = '" . $_SESSION['email'] . "'");
    if($result){
        echo '<div class="alert alert-success" role="alert">
        Update Sucess!!!
      </div>';
    }else{
        echo '<div class="alert alert-success" role="alert">
        Failed!!! 
      </div>';
    }
        
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>

<script src="validation.js"></script>

    <title>Dashboard</title>
    
</head>
<body>
<div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Updation</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <a class="nav-item nav-link" href="welcome.php">Home </a>
      <a class="nav-item nav-link" href="update.php">Update</a>
      <a class="nav-item nav-link" href="logout.php">Logout</a>

    </div>
  </div>
</nav>
<div>
<div>
    <section class="vh-100 bg-image"
  style="background-image: url('update.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-2">
              <h2 class="text-uppercase text-center mb-1">Update Account</h2>

              <form action="/phpstart/update.php" method='post' enctype="multipart/form-data">

                <div class="form-outline mb-1">
                <label class="form-label" for="fname">First Name</label>
                  <input type="text" id="fname" name="fname" value="<?php echo $_SESSION['fname']?>" class="form-control form-control-lg" />
                  <h6 id="fname_err"></h6>
                
                </div>
                <div class="form-outline mb-1">
                <label class="form-label" for="lname">Last Name</label>
                  <input type="text" id="lname" value="<?php echo $_SESSION['lname']?>" name="lname" class="form-control form-control-lg" />
                  <h6 id="lname_err"></h6>
                  
                </div>
                <!-- <div class="form-outline mb-1">
                  <input type="email" name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="email">Email</label>
                </div> -->

                <div class="form-outline mb-">
                <label class="form-label" for="phone">Phone</label>
                  <input type="number" value="<?php echo $_SESSION['phone']?>" id="phone" name="phone" class="form-control form-control-lg" />
                  <h6 id="ph_err"></h6>
                  
                </div>
                <div class="form-outline mb-1">
                <label class="form-label" for="bio">Bio:</label>
                <textarea id="ibio" class="form-control" name="bio" rows="3"><?php echo $_SESSION['bio']?></textarea>
                <h6 id="bio_err"></h6>
                
                </div>
                
                <div class="form-outline mb-1">
                            <label for="myfile">Select a file:</label>
                            <input type="file" id="myfile" name="image">
                        </div>
                <div class="form-outline mb-1">
                <label class="form-label" for="password">Password</label>
                  <input type="password" value="<?php echo $_SESSION['password']?>" name="password" id="pass" class="form-control form-control-lg" />
                  <h6 id="pass_err"></h6>
                        </div>
                  
                </div>

             


                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Update</button>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    </div>
</div>
</div>
    
</body>
</html>






