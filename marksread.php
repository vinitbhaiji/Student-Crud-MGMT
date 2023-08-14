
<?php 
include 'connect.php';
session_start(); 
$email='email';
$role='role';
$id =$_GET['id'];
// $_SESSION['email']=$email;
// $_SESSION['role']=$role;
// ($_SESSION['role']!='student') &&
if(($_SESSION['loggedin']!= true || $_SESSION['loggedin']!= 'true')  ){
    session_destroy();
    header('location:index.php');
}

include 'connect.php';
$id = $name ='';
$id =$_GET['id'];
$sql = "SELECT * FROM `usertable` WHERE id=$id";
$result = mysqli_query($conn, $sql);
if ($result){
    $row = mysqli_fetch_array($result);
    $name=$row['name'];
    $maths=$row['maths'];
    $science=$row['science'];
    $chemistry=$row['chemistry'];
    $physics=$row['physics'];
    $biology=$row['biology'];
    $hindi=$row['hindi'];
    $english=$row['english'];
    $social=$row['social'];     
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Marks</title>
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
            <a class="nav-link" href="student.php"> Home </span></a>
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
            <!-- <th>User ID</th> -->
            <th>ID</th>
            <th>Name</th>
            <th>Maths</th>
            <th>Science</th>
            <th>Chemistry</th>
            <th>Physics</th>
            <th>Biology</th>
            <th>English</th>
            <th>Hindi</th>
            <th>Social</th>
            <!-- <th>Image</th> -->
        </tr>
    </thead>
    <?php
    $sql="SELECT * FROM `usertable` WHERE id=$id";
    $result=mysqli_query($conn,$sql);

    if($result){
        while($row=mysqli_fetch_array($result)){
            $id=$row['id'];
            $name=$row['name'];
            $maths=$row['maths'];
            $science=$row['science'];
            $chemistry=$row['chemistry'];
            $physics=$row['physics'];
            $biology=$row['biology'];
            $english=$row['english'];
            $hindi=$row['hindi'];
            $social=$row['social'];
        }
        echo'
        <tr>
            <td>'.$id.'</td>
            <td>'.$name.'</td>
            <td>'.$maths.'</td>
            <td>'.$science.'</td>
            <td>'.$chemistry.'</td>
            <td>'.$physics.'</td>
            <td>'.$biology.'</td>
            <td>'.$english.'</td>
            <td>'.$hindi.'</td>
            <td>'.$social.'</td>
            ';
    }
    ?>
    <tbody>
</body>
</html>