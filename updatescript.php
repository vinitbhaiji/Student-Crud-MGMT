<?php 
include 'connect.php';
$id = $name = $email = $mobile = $class = $city= $state = $country = $image ='';
if(isset($_POST['Register'])){ 
        $id=$_POST['id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $class=$_POST['class'];
        $country=$_POST['country'];
        $state=$_POST['state'];
        $city=$_POST['city'];
        $mobile=$_POST['mobile'];
        $image=$_POST['image']; 

        $sql="UPDATE `usertable` SET `id`='$id',`name`='$name',`email`='$email', `class`='$class',`city`='$city',`state`='$state',`country`='$country',`mobile`='$mobile',`image`='$image' WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo 'sucessfully updated';
        
    }
}
?>