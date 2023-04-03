<?php
    // require_once("pro-index.php");
    // require_once("nav.php");

    require ('header.php');
    // require_once('register.data.php');

    if($_SERVER["REQUEST_METHOD"]=="POST"){
    // if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirm_password=$_POST['confirm_password'];

        $conn =make_connection();
        

        
        if((strlen($email)>0 && filter_var($email ,FILTER_VALIDATE_EMAIL)) && strlen($name) >0 && strlen($password)>0){
            $query =sprintf("SELECT * FROM users WHERE email ='%s'", 
            mysqli_real_escape_string($conn,$email));
            $result=mysqli_query($conn,$query);
            

            if($result->num_rows >0){
                $errors['body']="Email already eist.";
            }else{
                // echo"haha";
                if($password ==$confirm_password){
                    $query=sprintf("INSERT INTO users (name,email,password,confirm_password) VALUE(' %s','%s','%s','%s') ",
                    mysqli_real_escape_string($conn,$name),
                    mysqli_real_escape_string($conn,$email),
                    mysqli_real_escape_string($conn,password_hash($password,PASSWORD_DEFAULT)),
                    mysqli_real_escape_string($conn,password_hash($confirm_password,PASSWORD_DEFAULT))
                    );
                    if(mysqli_query($conn,$query)){
                        header("Location: ./login");
                        exit();
                    }
                }else{
                    $errors['body']="Password and password_confirm are not same.";
                }
            }
        }else{
            $errors['body'] ="Your data was not strong babe:";
        }
    }else{
        // $errors['body']="your are not human.";ddadgn,;asdgjl
    }
?>

<div class="container">
    <div class="con-main">
        <form  method="post">
            <label for="name">Enter Name</label>
            <input id="name" type="text" name="name" placeholder="enter name......">
            <label for="email">Enter Email</label>
            <input id="email" type="email" name="email" placeholder="enter email......" >
            <label for="pass">Enter Password</label>
            <input id="pass" type="password" name="password" placeholder="enter password......" >
            <label for="con-pass">Enter Confirm-Password</label>
            <input id="con-pass" type="password" name="confirm_password" placeholder="enter confirm-password......" >
            <input type="submit" value="Submit">
            <div>
                <?php if(isset($errors['body'])):?>  
                    <div style="color:red;text-align:center; " ><?= $errors['body'] ?></div>
                <?php endif;?>
            </div>  
            <div class="d-flex justify-content-center links">
				Already have account? <a href="./login" class="ml-2"> Login Here</a>
			</div>
        </form>
    </div>
</div>

<?= $errors['duplicate'] ?? '' ?>  