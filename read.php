
<?php 
include 'connect.php';
session_start(); 
$email='email';
$role='role';
$_SESSION['email']=$email;
$_SESSION['role']=$role;
if(($_SESSION['role']!='admin') && ($_SESSION['loggedin']!= true || $_SESSION['loggedin']!= 'true')  ){
    session_destroy();
    header('location:index.php');
}

include 'connect.php';
$id = $name = $roll= $email = $mobile = $class = $city= $state = $country = $image ='';
$id =$_GET['id'];
$sql = "select * from `usertable` where id='$id'";
$result = mysqli_query($conn, $sql);

if ($result){

    $row = mysqli_fetch_array($result);
        $id=$row['id'];
        $name=$row['name'];
        $roll=$row['roll'];
        $email=$row['email'];
        $class=$row['class'];
        $country=$row['country'];
        $state=$row['state'];
        $city=$row['city'];
        $mobile=$row['mobile'];
        $image=$row['image'];   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../studentcrud/crud.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet">
    <link rel="import" href="connect.php">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand">User details</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="admin.php"> Home </span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
        </ul>
    </div>
    </nav>
    <?php
    include'connect.php';
    ?>
    <div class="container-card">
<table class="styled-table">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roll</th>
            <th>Role</th>
            <th>Class</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Mobile</th>
            <th>Image</th>
        </tr>
    </thead>
    <?php
    $sql="SELECT * FROM `usertable` where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        while($row=mysqli_fetch_array($result)){
            $id=$row['id'];
            $name=$row['name'];
            $email=$row['email'];
            $roll=$row['roll'];
            $role=$row['role'];
            $class=$row['class'];

            if($city==null){
                $cityname =null;
            }else{
            $city=$row['city'];
            $sql = "select name from `cities` where id='$city'";
            $result3 = mysqli_query($conn, $sql);
            $row3 = mysqli_fetch_array($result3);
            $cityname = $row3['name'];
            }

            if($state==null){
                $statename =null;
            }else{
            $state=$row['state'];
            $sql = "select name from `states` where id='$state'";
            $result2 = mysqli_query($conn, $sql);
            $row2 = mysqli_fetch_array($result2);
            $statename = $row2['name'];
            }
            if($country==null){
                $countryname =null;
            }else{
            $country=$row['country'];
            $sql = "select name from `countries` where id='$country'";
            $result1 = mysqli_query($conn, $sql);
            $row1 = mysqli_fetch_array($result1);
            $countryname = $row1['name'];
            }

            $mobile=$row['mobile'];
            $image=$row['image'];
            // print_r($image);
        }
        echo'
        <tr>
            <td>'.$id.'</td>
            <td>'.$name.'</td>
            <td>'.$email.'</td>
            <td>'.$roll.'</td>
            <td>'.$role.'</td>
            <td>'.$class.'</td>
            <td>'.$cityname.'</td>
            <td>'.$statename.'</td>
            <td>'.$countryname.'</td>
            <td>'.$mobile.'</td>
            <td>'. "<img src=".$image." width=100px height=100px>" . '</td>
            ';
    }
    ?>
    <tbody>
</body>
</html>