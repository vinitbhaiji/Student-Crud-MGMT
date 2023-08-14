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
?>
<?php
include 'connect.php';
$id = $name = $roll= $email = $mobile = $class = $role = $city= $state = $country = $image ='';

$sql = "SELECT * FROM `usertable` WHERE role='admission'";
$result = mysqli_query($conn, $sql);

if (!$result){  
    echo 'tatti code';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admissions</title>
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
    <a class="navbar-brand">Manage Users</a>
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
<div class="container-card">
<table class="styled-table">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <!-- <th>Roll</th> -->
            <th>Email</th>
            <!-- <th>Class</th> -->
            <!-- <th>Country</th>
            <th>State</th>
            <th>City</th>
            <th>Mobile</th>
            <th>Image</th> -->
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $sql="SELECT * FROM `usertable` WHERE role='admission'";
        $result=mysqli_query($conn,$sql);
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $name=$row['name'];
                $roll=$row['roll'];
                $email=$row['email'];
                // $password=$row['password'];
                // $class=$row['class'];

                // $country=$row['country'];
                // $sql = "select name from `countries` where id='$country'";
                // $result1 = mysqli_query($conn, $sql);
                // $row1 = mysqli_fetch_array($result1);
                // $countryname = $row1['name'];

                // $state=$row['state'];
                // $sql = "select name from `states` where id='$state'";
                // $result2 = mysqli_query($conn, $sql);
                // $row2 = mysqli_fetch_array($result2);
                // $statename = $row2['name'];

                // $city=$row['city'];
                // $sql = "select name from `cities` where id='$city'";
                // $result3 = mysqli_query($conn, $sql);
                // $row3 = mysqli_fetch_array($result3);
                // $cityname = $row3['name'];

                $mobile=$row['mobile'];
                // $image=$row['image'];
                // <td>'.$class.'</td>
                // <td>'.$countryname.'</td>
                // <td>'.$statename.'</td>
                // <td>'.$cityname.'</td>
                // <td>'.$mobile.'</td>
                // <td>'.$image.'</td>
                // <td>'.$roll.'</td>

                echo '
                <tr>
                <td>'.$id.'</td>
                <td>'.$name.'</td>
                <td>'.$email.'</td>
                
                <td>
                <a href="read.php?id='.$id.'" class="text-light btn btn-dark" style="text-decoration:None;"> <i class="fa-solid fa-face-flushed"></i></a>
                    <a href="update.php?id='.$id.'" class="text-light btn btn-primary" style="text-decoration:None;"><i class="fa-regular fa-pen-to-square"></i></a>
                    <a href="delete.php?id='.$id.'" class="text-light btn btn-danger btn_del" style="text-decoration:None; width:auto;" onclick="return (this);"> <i class="fa-solid fa-skull"></i></a>
                </td>
                </tr>';
                }
            }
            ?>
    </tbody>
</table>
</div>
</body>
</html>