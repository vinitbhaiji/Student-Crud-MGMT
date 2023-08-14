<?php
require "connect.php";
    $id=$_POST["id"];

    $sql="UPDATE `usertable` SET role='admission' WHERE id= '$id'";
    $result = mysqli_query($conn,$sql);
    // print_r($sql);
    if($result == true){
        echo '1';
    }
    ?>