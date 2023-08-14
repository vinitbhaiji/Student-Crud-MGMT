<?php
    $user=0;
    $invalid=0;
    $success=0;

if($_SERVER["REQUEST_METHOD"]== "POST"){ 
    include 'connect.php'; 
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cp=$_POST['cp'];

    $sql="SELECT * FROM `usertable` WHERE name='$name'";
    $result= mysqli_query($conn,$sql);
    if($result)
    {
        $num=mysqli_num_rows($result);
        if($num>0)
        {
            $user=1;
        }
        else
        {
            if(($email!='' || $email!=NULL) && $password==$cp){
            $sql="INSERT INTO `usertable`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
            $result=mysqli_query($conn,$sql);
            if($result){
                $success=1;
            }
        }
        else
            {
                $invalid=1;
            }
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../studentcrud/crud.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet">
    <link rel="import" href="connect.php">
</head>
<body>




    <?php
    if($user){
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong> You already exist </strong> be another person<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    <?php
    }
    ?>

    <?php
    if($success){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert"> You have <strong> Successfully </strong> registered yourself <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    <?php
    }
    ?>

    <?php
    if($invalid){
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong> Wrong Credentials </strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    <?php
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="container-card mt-5 col-md-6">
                <div class="card">
                    <div class="cardbody">
                        <form METHOD="post" action="index.php">
                        <div class="text-danger" style="font-weight:bold; display:flex; justify-content:center; margin-top:5px; font-size:30px;">Register</div>
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Your Name" required autocomplete="off">

                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Your email" required autocomplete="off">

                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter Password" required autocomplete="off">
                        
                        <label for="cp"> Confirm Password</label>
                        <input type="password" name="cp" placeholder="Confirm Password" required autocomplete="off"> 

                        <Button class="btn btn-danger" name="Register" style="margin:20px 0px; align-self:center;"> Register </Button>
                        </form>
                    </div>
                </div>
            </div>
        <div class="container-card mt-5 col-md-6">
                <div class="card">
                    <div class="cardbody"> 
                        <form METHOD="post" action="../studentcrud/login.php">
                        <div class="text-danger" style="font-weight:bold; display:flex; justify-content:center; margin-top:5px; font-size:30px;">Login</div>

                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Your email" required autocomplete="off">

                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter Password" required autocomplete="off"> 

                        <Button type="submit" class="btn btn-danger" name="Register" style="margin:20px 0px; align-self:center;"> Login </Button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>