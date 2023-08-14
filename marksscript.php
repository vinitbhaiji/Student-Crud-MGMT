<?php 
include 'connect.php';

// $id = $name = $email = $mobile = $class = $city= $state = $country = $image ='';
if(isset($_POST['Register'])){ 
    $name=$_POST['name'];
    $maths=$_POST['maths'];
    $science=$_POST['science'];
    $chemistry=$_POST['chemistry'];
    $physics=$_POST['physics'];
    $biology=$_POST['biology'];
    $hindi=$_POST['hindi'];
    $english=$_POST['english'];
    $social=$_POST['social'];   

        $sql="INSERT INTO `usertable`( `maths`, `science`, `chemistry`, `physics`, `biology`, `english`, `hindi`, `social`) VALUES ('$maths','$science','$chemistry','$physics','$biology','$english','$hindi','$social')";

        // $sql="UPDATE `marks` SET `id`='$id',`name`='$name',`email`='$email', `class`='$class',`city`='$city',`state`='$state',`country`='$country',`mobile`='$mobile',`image`='$image' WHERE id=$id";
        $result=mysqli_query($conn, $sql);
    if($result)
    { 
        // print_r($result);
        // echo 'wtf';
        header('location:teacher.php');
        
    }
}
?>