<?php 

    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $categories=$_POST['categories'];
        $user_id=$_POST['user_id'];
        $post_id=$_POST['post_id'];
        $conn=make_connection();

        $query="UPDATE nodes SET title='".$title."', categories='".$categories."',user_id='".$user_id."' WHERE id='".$post_id."'";
        
        if(mysqli_query($conn,$query)){
            header("Location: ./notes");
            exit();
        }
    }