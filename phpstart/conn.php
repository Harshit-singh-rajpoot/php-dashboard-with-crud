<?php
echo "Connectinng to a db";
$server = "localhost";
$user = "root";
$pass = "";
$con=mysqli_connect($server,$user,$pass);
if(!$con){
    die ("access denied".mysqli_connect_error());
}else{
    echo "<br>  con sucess!";
}
$sql="CREATE DATABASE db1";
$result=mysqli_query($con,$sql);
if($result){
    echo "<br>db create sucess";
}else{
    echo "<br>failure because ".mysqli_error($con);
}
?>