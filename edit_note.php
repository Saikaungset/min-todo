<?php 
    
    require base_path('header.php');

    if(isset($_POST['submit'])){
        $id=$_POST['post_id'];
        $conn=make_connection();

        $query="SELECT * FROM nodes WHERE id='".$id."'";
        $result=mysqli_query($conn,$query);
        if($result->num_rows >0){
            $row=$result->fetch_assoc();
        }else{
            $errors['body']="WE can't fine data.";
        }
    }
    
?>

<div class="container">
    <div class="con-main">
            <form method="post" action="./update_note">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                <input type="hidden" name="post_id" value="<?php echo $row['id'] ?>">
                <label for="title">title</label>
                <input id="title" type="text" value="<?php echo $row['title'] ?>" name="title" placeholder="enter title......" >
                <label for="cat">Enter Categories</label>
                <textarea name="categories" id="cat"  cols="30" rows="10"><?php echo $row['categories'] ?></textarea>
                <input type="submit" value="Submit" name="submit">
                <div>
                    <?php if(isset($errors['body'])):?>
                        <div style="color:red;text-align:center; " ><?= $errors['body'] ?></div>
                    <?php endif;?>
                </div>
                <div class="d-flex justify-content-center links">
                    Already have account? <a href="/" class="ml-2">Help?</a>
                </div>
            </form>
    </div>
</div>