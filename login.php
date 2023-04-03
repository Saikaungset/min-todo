<?php
    
    require base_path('header.php');
    if(isset($_SESSION['id'])){
        header("Location: ./");
        exit();
    }
    if(isset($_POST['submit'])){
        $email =$_POST['email'];
        $password =$_POST['password'];

        $conn =make_connection();
        if(strlen($email)>0 && filter_var($email ,FILTER_VALIDATE_EMAIL) && strlen($password)>0){
            // $result =mysqli_query($conn ,"SELECT * FROM users WHERE email = '".$email."'");
            $query =sprintf("SELECT * FROM users WHERE email= '%s'",
            mysqli_real_escape_string($conn,$email));
            $result=mysqli_query($conn,$query);
            $row =$result->fetch_assoc();
            if(isset($row)){ 
                if($row['email']==$email ){
                    if(password_verify($password,$row['password'])){
                        sess_data($row['id'],$row['name']);
                        // var_dump($_SESSION);
                        header("Location: ./");
                        exit();
                    }else{
                        $errors['body']="Eamil or password was wrong.";
                    }
                }else{
                    $errors['body']="email or password is not correct.";
                }
            }else{
                $errors['body']="email or password is not correct.";
            }
        }else{
            $errors['body']="your data no have";
        }

    }
    
?>

<div class="container">
    <div class="con-main">
        <form method="post">
            <label for="email">Enter Email</label>
            <input id="email" type="email" name="email" placeholder="enter email......" >
            <label for="pass">Enter Password</label>
            <input id="pass" type="password" name="password" placeholder="enter password......" >
            <input type="submit" value="Submit" name="submit">
            <div>
                <?php if(isset($errors['body'])):?>
                    <div style="color:red;text-align:center; " ><?= $errors['body'] ?></div>
                <?php endif;?>
            </div>
            <div class="d-flex justify-content-center links">
				Already have account? <a href="" class="ml-2"> Register Here</a>
			</div>
        </form>
    </div>
</div>