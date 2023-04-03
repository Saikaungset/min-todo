<?php


function base_path($file){
    return BASE_PATH .$file;
}


    function make_connection(){
        $dbhost="localhost";
        $dbuser="root";
        $dbpass="";
        $dbname="tuto"; 

        mysqli_report(MYSQLI_REPORT_OFF);
        $conn =mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

        if(!$conn){
            die("Connection fail");
        }
        return $conn;
    }

    function check_login($conn,$email){
        $sql="SELECT * FROM users WHERE email='".$email."'";
        $result=mysqli_query($conn,$sql);

        if($result->num_rows ==0){
            header("Location: ./login.php?error=email not exit.");
            exit();
        }else{
            return $result->fetch_assoc();
        }
    }

    function get_node_data($conn){
        $sql="SELECT * FROM nodes";
        $result=mysqli_query($conn,$sql);

        if($result->num_rows ==0){
            // header("Location: ./index.php?error =there have no data.");
            // exit();
            return $errors['body']="your data no have.";
        }else{
            return $result;
        }
    }

    function sess_data($id,$name){
        $_SESSION['id']=$id;
        $_SESSION['name']=$name;
    }

?>
