<?php 
    require base_path('header.php');

    $conn =make_connection();
    if(isset($_POST['submit'])){
        $user_id=$_POST['user_id'];
        $categories=$_POST['categories'];
        $time =date("Y-m-d H:i:s");
        if(strlen($categories) >0){
            $query="INSERT INTO todo (user_id,categories,create_up,update_up)
                    VALUES('".$user_id."','".$categories."','".$time."','".$time."')";
            $result =mysqli_query($conn,$query);
            // $row =$result->fetch_assoc();
        }else{
            $errors['body']="please enter somethings.....";
        }
    }

?>

<div>
    <div class="main_todo">
        <div class="input_data">
            <?php if(isset($_SESSION['id'])): ?>
                <form  method="post">
                        <input type="hidden" name="user_id" value="<?php echo ($_SESSION['id']) ?>">
                        <input class="todo_input" type="text" placeholder="text here...." name="categories">
                        <button class="todo_btn" type="submit" name="submit">ADD</button>

                        <?php if(isset($errors['body'])) :?>
                                <p style="text:align-center;color:red;"><?php echo($errors['body']) ?></p>
                        <?php endif; ?>
                </form>
            <?php else: ?>
                <p style="color:red;text-align:center;">Please Login mybro......</p>
            <?php endif; ?>
            <div class="show_data">
                <table>
                    <tr class="t_header">
                        <th>NO</th>
                        <th class="t_header_se">Categories</th>
                        <th class="t_header_th"></th>
                        <th class="t_header_th"></th>
                    </tr>
                    
                    <?php if(isset($_SESSION['id'])): ?>
                        <?php
                            $data="SELECT * FROM todo WHERE user_id ='".$_SESSION['id']."'";
                            $val =mysqli_query($conn,$data);

                            $row =$val;
                            $number=1;
                        ?>
                        <?php if($row->num_rows >0) : ?>
                            <?php while($do=$row->fetch_assoc()): ?>
                                <tr class="t_data">
                                    <td><?php echo($number) ?></td>
                                    <td><?php echo($do['categories']) ?></td>
                                    <td><button class="t_data_btn"><?php echo'<a href="/delete?id='.$do['id'].'">Delete</a>'?></button></td>
                                    <td>
                                        <form action="./todo_edit" method="post">
                                            <input type="hidden" name="todo_id" value="<?php echo $do['id'] ?>" >
                                            <input type="submit" value="Edit" name="submit" style="padding:10px; border-radius:10px;">
                                            <!-- <button class="t_data_btn"><a href="">Edit</a></button> -->
                                        </form>
                                    </td>
                                </tr>
                                <?php $number++ ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p style="color:red;text-align:center;">NO Data not have..</p>
                        <?php endif; ?>
                    <?php else : ?>
                        <p style="color:red;text-align:center;">NO Data not have..</p>
                    <?php endif; ?>

                </table>
            </div>
        </div>
    </div>
</div>