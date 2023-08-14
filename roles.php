<?php

    require "connect.php";
    $id=$_POST["id"];

    $sql="UPDATE `usertable` SET role='student' WHERE id= '$id'";
    $result = mysqli_query($conn,$sql);
    // print_r($sql);
    if($result != true){
        echo 'failed';
    }
    
    // $('#student').on('click', function() { 
    //         var role = $(this).closest("tr").find("role");
    //         var id = $(this).closest("tr").find("id");
    //         $.ajax({
    //             url: "roles.php",
    //             type: "POST",
    //             data: {
    //                 id:id,
    //                 role: role
    //             },
    //             cache: false,
    //             success: function(result){
    //                 console.log(result);
    //                 $("#student").html(result); 
    //             }
    //         });
        
        
    // });    
?>
