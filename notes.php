
<?php
    require base_path('header.php');
    
    $conn =make_connection();
    $result =mysqli_query($conn,"SELECT * FROM nodes");
    // if($result->num_rows ==0){
    //     $errors['body']="notes data no have.";
    // }else{
    //     return $result;
    // }

    // $get_notes_data=get_node_data($conn);
?>

<?php  if($result->num_rows >0) : ?> 
    <?php while($data =$result->fetch_assoc()): ?>
        <div class="nodes_data">
            <div class="data_n_container">
                <h2><?php echo $data['title'] ?></h2>
                <p><?php echo substr(($data['categories']),0,20). '...' ?></p>
                <?php echo'<a href="/details?id='.$data['id'].'">SEE MORE</a>'?>

            </div>
        </div>

    <?php endwhile; ?>
<?php else: ?>
    <div>
        <p style="color:red; text-align:center;"><?php echo $errors['body']="NO data have" ?></p>
    </div>
<?php endif; ?>

<!-- htmltities -->
<!-- mysqli_real_escape_string($conn,$_GET['id'])==sprintf -->
