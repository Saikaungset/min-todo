<?php 
    
    require base_path('header.php');
    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $categories=$_POST['categories'];
        $user_id=$_POST['user_id'];
        $conn =make_connection();

        if(strlen($title)>0 && strlen($categories)>0){
            $sql=sprintf("INSERT INTO nodes (title,categories,user_id) VALUE ('%s','%s','%s')",
            mysqli_real_escape_string($conn,$title),
            mysqli_real_escape_string($conn,$categories),
            mysqli_real_escape_string($conn,$user_id)
            );
            var_dump($sql);
            if(mysqli_query($conn,$sql)){
                header("Location: ./notes");
                exit();
            }else{
                $errors['body']="sorry i can't create myboss.";
            }
        }else{
            $errors['body']="Please fill in the blank myboss.";
        }
    }
    
?>

<div class="container">
    <div class="con-main">
        <?php if(isset($_SESSION['id'])): ?>
            <form method="post">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                <label for="title">title</label>
                <input id="title" type="text" name="title" placeholder="enter title......" >
                <label for="cat">Enter Categories</label>
                <textarea name="categories" id="cat" cols="30" rows="10"></textarea>
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
        <?php else : ?>
            <p style="color:red; text-align:center;">Please Login my little bro.</p>
        <?php endif; ?>
    </div>
</div>

?>