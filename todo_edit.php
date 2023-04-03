<?php 
    require base_path('header.php');
    if(isset($_POST['submit'])){
        $id=$_POST['todo_id'];
        $conn=make_connection();

        $sql="SELECT * FROM todo WHERE id='".$id."'";
        $result=mysqli_query($conn,$sql);
    }

?>

<div>
    <div class="main_todo">
        <div class="input_data">
            <?php if($result->num_rows >0) : ?>
                <?php $data=$result->fetch_assoc();  ?>
                <form  method="post" action="./update_todo">
                        <input type="hidden" name="post_id" value="<?php echo ($data['id']) ?>">
                        <input type="hidden" name="user_id" value="<?php echo ($_SESSION['id']) ?>">
                        <input class="todo_input" value="<?php echo $data['categories'] ?>" type="text" placeholder="text here...." name="categories">
                        <button class="todo_btn" type="submit" name="submit">Update</button>

                        <?php if(isset($errors['body'])) :?>
                                <p style="text:align-center;color:red;"><?php echo($errors['body']) ?></p>
                        <?php endif; ?>
                </form>
                <div>
                    <button style="margin-top:100px;padding:10px;"><a href="./todo">Back</a></button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>