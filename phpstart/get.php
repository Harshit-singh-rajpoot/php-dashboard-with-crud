<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>get</title>

</head>

<body>
<?php
include 'db_get.php';
$sql="SELECT * FROM `reg_info`";
$res=mysqli_query($conn,$sql);
$num=mysqli_num_rows($res);
echo $num."<br>";
while($row=mysqli_fetch_assoc($res)){
    // echo var_dump($row);
    echo $row['S.no'] ." ".$row['Name']." " .$row['Email']."". $row['Password'];
    echo "<br>";
}
?>
</body>
</html>