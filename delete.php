<?php 

    if(isset($_GET['id'])){
        $id=$_GET['id'];

        $conn =make_connection();
        $sql ="DELETE FROM todo WHERE id ='".$id."'";

        if(mysqli_query($conn,$sql)){
            header("Location: ./todo");
            exit();
        }

    }


?>