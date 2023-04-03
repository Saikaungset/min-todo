<?php 

    if(isset($_POST['submit'])){
        $post_id=$_POST['post_id'];
        $user_id=$_POST['user_id'];
        $categories=$_POST['categories'];
        $conn=make_connection();

        $sql="UPDATE todo SET user_id='".$user_id."',categories='".$categories."' WHERE id='".$post_id."'";

        if(mysqli_query($conn,$sql)){
            header("Location: ./todo");
            exit();
        }else{
            echo"hello";
        }
    }