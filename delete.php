<?php
    include 'connect.php';

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        
        $sql="DELETE FROM `usertable` WHERE id=$id";
        
        $result=mysqli_query($conn,$sql);
        if($result){
            header('location:admin.php');
        }else{
            echo "failed to delete";
        }

    }
    ?>