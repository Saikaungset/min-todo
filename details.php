
<?php
    require base_path('header.php');
    
    $conn =make_connection();
    // $result =mysqli_query($conn,"SELECT * FROM nodes");
    if(isset($_GET['id'])){
        $id =$_GET['id'];

        $result =mysqli_query($conn,"SELECT * FROM nodes where id='$id'");
        $row =$result->fetch_assoc();
        // var_dump($row);
    }

?>
    <?php if(isset($row)): ?>
        <div class="nodes_data">
            <div class="data_n_container">
                <h2><?php echo $row['title'] ?></h2>
                <p><?php echo ($row['categories']) ?></p>
                <?php if(isset($_SESSION['id'])) : ?>
                    <?php if($_SESSION['id'] == $row['user_id']): ?>
                        <form action="./edit_note" method="post">
                            <input type="hidden" name="post_id" value="<?php echo $row['id'] ?>">
                            <input type="submit"name="submit" value="Edit" style="padding:10px;border-radius:10px;">
                            <!-- <button style="padding:10px;background:#f1f4f9;border-radius:10px;">Edit</button> -->
                        </form>
                        <button style="padding:10px;background:#f1f4f9;border-radius:10px;"><?php echo '<a href="./delete_note?id='.$row['id'].'">Delete</a>' ?></button>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php else : ?>
        <div>
            <?php echo '<p style="color:red;text-align:center;">There have no data</p>' ?>
        </div>
    <?php endif; ?>
